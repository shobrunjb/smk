<?php
	$i = \common\utils\EncryptionDB::encryptor('encrypt', $model->id_scrum_daily);
	$url = \yii\helpers\Url::to(['/member-project/detail/','i'=>$i]);
	$icon = 'fa-book';
	$icon = '<span class="fa fa-book"></span>';
	$date = $model->standup_date;

	//$pegawai
	$nama = '--';
	if(isset($model->pegawai)){
		$nama = $model->pegawai->nama_lengkap;
	}
?>

<tr>
	<td width="20px"><?= $icon ?></span></td>
	<td>
		<?php
		/*
 			echo $this->render('_setting_daily', [
                            'model' => $model,
                        ]);
        */
		?>

	</td>
	<td>
		<b><a href="#" class="text-light-blue"><?= \common\helpers\Timeanddate::getShortDateIndo($date) ?></a></b><br>
		<p class="text-light-green">@<?= $nama ?></p>
		<i><?= $model->yesterday_todo ?></i>
	</td>



</tr>


