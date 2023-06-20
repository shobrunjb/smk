<?php
$profileimg = "/images/default-project.jpg";

if($model->is_active == 1){
    $icon = '<span class="glyphicon glyphicon-fire img-circle"></span>';
    $label = '<span class="label label-success">Aktif</span';
    $badge = 'bg-blue';
}else{
    $icon = '<span class="glyphicon glyphicon-asterisk"></span>';
    $label = '<span class="label label-danger">Tidak Aktif</span';
    $badge = 'bg-in-active';
}
?>
<div class="box box-widget widget-user">

    <div class="widget-user-header bg-blue-active">
    <h3 class="widget-user-username"><?= $model->nama_proyek ?></h3>
    <h5 class="widget-user-desc"></h5>
    </div>
    <div class="widget-user-image">

    <img class="img-circle" src="<?php echo Yii::$app->request->baseUrl . $profileimg; ?>" alt="User Avatar">
    </div>
    <div class="box-footer">
    <div class="row">
    <div class="col-sm-4 border-right">
    <div class="description-block">
    <h5 class="description-header">1</h5>
    <span class="description-text">POIN</span>
    </div>

    </div>

    <div class="col-sm-4 border-right">
    <div class="description-block">
    <h5 class="description-header">1</h5>
    <span class="description-text">PERFORMANCE</span>
    </div>

    </div>

    <div class="col-sm-4">
    <div class="description-block">
    <h5 class="description-header">1</h5>
    <span class="description-text">ACTIVITY</span>
    </div>

    </div>

    </div>

    </div>
</div>

