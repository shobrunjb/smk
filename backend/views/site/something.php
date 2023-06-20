<?php

/* @var $this yii\web\View */
use backend\models\AppSettingSearch;
$appName = AppSettingSearch::getValueByKey("APP-NAME-SINGKAT");
$imgdefault = '@web/images/home.jpg';
$backimage = AppSettingSearch::getImageUrl("MAIN-BACKGROUND", $imgdefault);

$this->title = $appName;

?>
<style>
    .img-responsive {
        position: relative;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
    }

</style>
<div class="site-index">

    <div class="box">
        <div class="box-header with-border">

            <h3 class="box-title">Something Wrong...
            </h3>
      </div>
        <div class="box-body">
            Silakan cek kembali jika ada kesalahan. Untuk kembali ke home silakan klik tombol ini. <Br>
            <a href="index" class="btn btn-primary"><i class="fa fa-home"></i> Home</a>
        </div>
    </div>

</div>
