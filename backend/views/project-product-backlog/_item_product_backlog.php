<?php
	$satuanWaktu = "";
	if(isset($model->satuanWaktu)){
		$satuanWaktu = $model->satuanWaktu->time_metric_id;
	}

	$sprint = "-- belum diassign --";
	if(isset($model->sprint)){
		$sprint = $model->sprint->sprint_number;
	}
	$idi = \common\utils\EncryptionDB::encryptor('encrypt', $model->id_product_backlog);
	$progress = $model->progres_by_team; //Progres dinilai tim sendiri
?>

<tr>
	<td width="20px">#<?= $model->order_number ?></td>
	
	<td><i><?= $model->product_backlog ?></i></td>
	<td><?= $model->load_estimatation ?> <?= $satuanWaktu ?></td>
	<td>
		<?php
		if($model->project->backlog_is_locked != 2){
			echo $this->render('_setting', [
                'action'=>$action,
                't' => $t,
                'i' =>$i,
                'idi'=>$idi,
                //'project' =>$model
            ]);
		}
		?>
	</td>
	<td>
		<div class="progress progress-xs">
		<div class="progress-bar progress-bar-success" style="width: <?= $progress ?>%"></div>
		</div>
	</td>
	<td><span class="badge bg-green"><?= $progress ?>%</span></td>
	<td><?= $sprint ?></td>

</tr>
