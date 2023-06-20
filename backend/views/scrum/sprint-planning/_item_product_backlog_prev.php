<?php
	$satuanWaktu = "";
	if(isset($model->satuanWaktu)){
		$satuanWaktu = $model->satuanWaktu->time_metric_id;
	}

	$sprintassign = "-- belum diassign --";
	$checked = "";
	if(isset($model->sprint)){
		$sprintassign = 'SPRINT #'.$model->sprint->sprint_number;
		if($model->id_sprint == $sprint->id_sprint){
			$checked = "checked";
		}
	}
	$idi = \common\utils\EncryptionDB::encryptor('encrypt', $model->id_product_backlog);
	$progress_po = 0;
	$progress = 0;
	$style_completed = "completed";
	$label_selesai = '<span class="badge bg-green">Selesai</span>';

	//Difilter yang ditampilkan hanya yang belum diassign dan yang sesuai dengan sprintnya
	if($model->id_sprint >= 0 && $model->id_sprint != $sprint->id_sprint) {
		$progress = $model->progres_by_team; //Progres dinilai tim sendiri
		

		$sprintbacklog_sprintnow = \backend\models\SprintBacklog::find()
            ->where([
                'id_sprint' => $sprint->id_sprint,
                'id_product_backlog' => $model->id_product_backlog,
            ])->one();
        if($sprintbacklog_sprintnow != null){
        	$checked = "checked";
        }

        $sprintbacklog_sprintprevious = \backend\models\SprintBacklog::find()
            ->where([
                'id_sprint' => $model->id_sprint,
                'id_product_backlog' => $model->id_product_backlog,
            ])->one();
        if($sprintbacklog_sprintprevious != null){
        	$progress = $sprintbacklog_sprintprevious->last_progres_by_team;
        	$progress_po = $sprintbacklog_sprintprevious->last_progres_by_owner; //Progres dinilai PO
        	if($progress < 100) {
        		$style_completed = "not_completed"; 
        		$label_selesai = '<span class="badge bg-red">Belum selesai</span>';
        	}
        	if($progress_po < 100) {
        		$style_completed = "not_completed";
        		$label_selesai = '<span class="badge bg-red">Belum selesai</span>';
        	}

        	//echo $sprintbacklog_sprintprevious->sprint->sprint_number;
        }

        //$progress_po = $model->progres_by_owner;
?>

<tr id="special_<?= $style_completed ?>">
	<?php
	if($readonly == false) {
	?>
	<td>
		<input type="checkbox" name="checked_<?= $model->id_product_backlog ?>" class="pull-right" <?= $checked ?>/>
	</td>
	<?php 
	}
	?>
	
	<td width="20px">#<?= $model->order_number ?></td>	
	<td><i><?= $model->product_backlog ?></i></td>

	<td><span class="badge bg-green"><?= $progress ?>%</span></td>
	<td><span class="badge bg-blue"><?= $progress_po ?>%</span></td>
	<td><?= $sprintassign ?></td>
	<td><?= $label_selesai ?></td>
</tr>
<?php 
}
?>