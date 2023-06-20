<?php
$satuanWaktu = "";
if(isset($model->productBacklog)){
	$model_pb = $model->productBacklog;

	if(isset($model_pb->satuanWaktu)){
		$satuanWaktu = $model_pb->satuanWaktu->time_metric_id;
	}

	$sprintassign = "-- belum diassign --";
	$checked = "";
	if(isset($model_pb->sprint)){
		$sprintassign = 'SPRINT #'.$model_pb->sprint->sprint_number;
		if($model_pb->id_sprint == $sprint->id_sprint){
			$checked = "checked";
		}
	}
	$idi = \common\utils\EncryptionDB::encryptor('encrypt', $model_pb->id_product_backlog);


	//Difilter yang ditampilkan hanya yang belum diassign dan yang sesuai dengan sprintnya
	//if($model_pb->id_sprint == 0 || $model_pb->id_sprint == $sprint->id_sprint) {
	if($model->id_sprint == $sprint->id_sprint) {
		$progress = $model_pb->progres_by_team; //Progres dinilai tim sendiri
?>

<tr>
	<?php
	if($readonly == false) {
	?>
	<td>
		<input type="checkbox" name="checked_<?= $model_pb->id_product_backlog ?>" class="pull-right" <?= $checked ?>/>
	</td>
	<?php 
	}
	?>
	
	<td width="20px">#<?= $model_pb->order_number ?></td>	
	<td><i><?= $model_pb->product_backlog ?></i></td>
	<td><?= $model_pb->load_estimatation ?> <?= $satuanWaktu ?></td>
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
}
?>