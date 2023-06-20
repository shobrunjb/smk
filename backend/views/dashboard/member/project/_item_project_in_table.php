<?php
	$title = "Untitled";
	if(isset($model->project)){
		$title = $model->project->nama_proyek;
		$project = $model->project;

		$box_type = "box-success";
		if($project->is_active == 1){
			$box_type = "box-success";
		}else{
			$box_type = "box-danger";
		}

		if($project->description != ""){
			$deskripsi = $project->description;
		}else{
			$deskripsi = $title;
		}

		//Icon
		if($project->is_active == 1){
			$icon = '<span class="glyphicon glyphicon-fire"></span>';
			$label = '<span class="label label-success">Aktif</span';
			$badge = 'bg-blue';
		}else{
			$icon = '<span class="glyphicon glyphicon-asterisk"></span>';
			$label = '<span class="label label-danger">Tidak Aktif</span';
			$badge = 'bg-in-active';
		}

		$kode = $project->kode_proyek;
		$i = \common\utils\EncryptionDB::encryptor('encrypt', $project->id_project);
		$url = \yii\helpers\Url::to(['/member-project/detail/','i'=>$i]);
?>

<tr>
	<td width="20px"><?= $icon ?></span></td>
	<td>
		<b><a href="<?= $url ?>"><?= $title ?></a></b><br>
		<i><?= $deskripsi ?></i>
	</td>
	<td><span class="badge <?= $badge ?>">
		<?= $kode ?>
		</span>
	</td>
	<td>
		<?php
 			echo $this->render('_setting_project', [
                            'project' => $project,
                        ]);
		?>

	</td>
	<td><?= $label ?></td>
</tr>


<?php 
}
?>