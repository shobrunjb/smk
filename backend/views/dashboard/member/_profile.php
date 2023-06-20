<?php
    $modeluser = \backend\models\User::findOne(Yii::$app->user->identity->id);
    $profileimg = "/images/default-profile.jpg";
    //$modeluser = \backend\models\User::findOne(Yii::$app->user->identity->id);
    $pegawai = \backend\models\HrmPegawai::find()
                ->where(['id_user' => $modeluser->id])
                ->one();
    if($pegawai != null) {
?>
<div class="box box-widget widget-user">

    <div class="widget-user-header bg-green-active">
    <h3 class="widget-user-username"><?= $pegawai->nama_lengkap ?></h3>
    <h5 class="widget-user-desc"><?= $pegawai->jbt_jabatan ?></h5>
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

<?php
}
?>