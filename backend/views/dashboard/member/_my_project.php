<?php
    $modeluser = \backend\models\User::findOne(Yii::$app->user->identity->id);
    $profileimg = "/images/default-profile.jpg";
    //$modeluser = \backend\models\User::findOne(Yii::$app->user->identity->id);
    $pegawai = \backend\models\HrmPegawai::find()
                ->where(['id_user' => $modeluser->id])
                ->one();
    if($pegawai != null) {
?>
<?php
    //Check Apakah sudah terhubung ke sebuah perusahaan
    $hasPerusahaan = \backend\models\HrmPegawaiSearch::checkHashPerusahaan($modeluser->id);
    if($hasPerusahaan == false){
        echo  $this->render('_join_perusahaan', [
            'pegawai' => $pegawai,
        ]);
    }else{
        //Get Active Project
        $countProject = \backend\models\ProjectMember::find()
                ->where(['id_pegawai' => \backend\models\HrmPegawai::getIdPegawaiFromUserId()])
                ->count();
        if($countProject > 0){
            //Display Project
            echo $this->render('project/_list_project', [
                                't' => "",
                            ]);
        }else{
            //Display tidak ada proyek
            echo $this->render('project/_project_empty_simple', [
                                't' => "",
                            ]);
        }

    }
?>

<?php
}
?>