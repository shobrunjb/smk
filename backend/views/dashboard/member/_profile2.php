<?php
    $modeluser = \backend\models\User::findOne(Yii::$app->user->identity->id);
    $profileimg = "/images/default-profile.jpg";
    //$modeluser = \backend\models\User::findOne(Yii::$app->user->identity->id);
    $pegawai = \backend\models\HrmPegawai::find()
                ->where(['id_user' => $modeluser->id])
                ->one();
    if($pegawai != null) {
      $total_proyek = 0;
      if($pegawai->id_perusahaan > 0){
        $perusahaan = isset($pegawai->perusahaan) ? $pegawai->perusahaan->perusahaan : "--"
?>
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?= $perusahaan ?><sup style="font-size: 20px"></sup></h3>

                  <p>Perusahaan Anda</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <?php
                $url_menu2 = \yii\helpers\Url::toRoute(['index']);
                ?>
                <a href="<?= $url_menu2 ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>

<?php
}else{
  echo '<div class="callout callout-warning">
  <h4>Belum Bergabung</h4>
  <p>Anda belum terasosiasi atau bergabung dengan perusahaan / organisasi tertentu. Sialakan pilih di bagian bawah untuk bergabung dengan perusahaan.</p>
  </div>';
}
}
?>