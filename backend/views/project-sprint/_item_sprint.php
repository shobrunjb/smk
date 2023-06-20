<?php
	$satuanWaktu = "";
	if(isset($model->satuanWaktu)){
		$satuanWaktu = $model->satuanWaktu->time_metric_id;
	}

	$idi = \common\utils\EncryptionDB::encryptor('encrypt', $model->id_sprint);
	$url = \yii\helpers\Url::to(['/member-sprint/detail/','i'=>$idi]);

	$icon_lock = '';
	if($model->is_closed == 2){
		$icon_lock = '<i class="fa fa-fw fa-lock"></i>';
	}
?>

<tr>
	<td width="20px">#<?= $model->sprint_number ?></td>
	
	<td><a href="<?= $url ?>"><B><i>SPRINT <?= $model->sprint_number ?> <?= $icon_lock ?></i></B></a></td>

	<td>
		<?php
			echo $this->render('_setting', [
                'action'=>$action,
                't' => $t,
                'i' =>$i,
                'idi'=>$idi,
                //'project' =>$model
            ]);
		?>
	</td>
	<td><?= \common\helpers\Timeanddate::getShortDateIndo($model->start_date) ?></td>
	<td><?= \common\helpers\Timeanddate::getShortDateIndo($model->end_date) ?></td>

</tr>
