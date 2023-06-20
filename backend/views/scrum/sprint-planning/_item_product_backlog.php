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


	//Difilter yang ditampilkan hanya yang belum diassign dan yang sesuai dengan sprintnya
	if($model->id_sprint == 0 || $model->id_sprint == $sprint->id_sprint) {
		$progress = $model->progres_by_team; //Progres dinilai tim sendiri
?>

<tr>
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
	<td><?= $model->load_estimatation ?> <?= $satuanWaktu ?></td>
	<td>
		<div class="progress progress-xs">
		<div class="progress-bar progress-bar-success" style="width: <?= $progress ?>%"></div>
		</div>
	</td>
	<td><span class="badge bg-green"><?= $progress ?>%</span></td>
	<td><?= $sprintassign ?></td>

</tr>
<?php 
}
?>