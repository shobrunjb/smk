<?php
use yii\helpers\Url;

$profileimg = "/images/default-project.jpg";
$i = \common\utils\EncryptionDB::encryptor('encrypt', $model->id_project);
$urld = Url::toRoute(['/member-project/detail/', 'i' => $i]);
if($model->is_active == 1){
    $icon = '<span class="glyphicon glyphicon-fire img-circle"></span>';
    $label = '<span class="label label-success">Aktif</span';
    $badge = 'bg-blue';
}else{
    $icon = '<span class="glyphicon glyphicon-asterisk"></span>';
    $label = '<span class="label label-danger">Tidak Aktif</span';
    $badge = 'bg-in-active';
}
$proyek = "&nbsp;";
if(isset($model->project)){
    $proyek = $model->project->nama_proyek;
}
?>
<div class="small-box bg-green">
<div class="inner">
<h3>SPRINT #<?= $model->sprint_number ?></h3>
<p></p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div><span class="small-box-footer"><a href="<?=$urld?>" style="color: white;"><?= $proyek ?></a></span>
 <?php //<a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a> ?>
</div>

