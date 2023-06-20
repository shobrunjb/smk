<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<div class="box-body <?php /*table-responsive*/ ?> no-padding">
<?php
//$form = ActiveForm::begin();
    $form = ActiveForm::begin([
        //'action' => [Url::current().'#url']
        'method' => 'POST'
    ]);
?>

<?php
    if($messagelock != ""){
        echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>';
        echo $messagelock;
        echo '</div>';
    }
?>


<div class="alert alert-info">
<?php
    if($sprint->is_closed != 2){
        echo 'Menu ini untuk menutup SPRINT #'.$sprint->sprint_number.". <br>Jika Sprint sudah ditutup, maka sudah tidak bisa diubah kembali.<br>Hak untuk menutup dan membuka kembali sprint ada pada Product Owner";
        $readonly = false;
    }else{
        echo '<i class="fa fa-fw fa-lock"></i>'.' Sprint sudah ditutup. Anda hanya bisa melihat saja terkait datanya!';
        $readonly = true;
    }
?>
</div>

<?php
    if($sprint->is_closed != 2){
?>

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <!-- <input type="submit" value='SETUJUI & KUNCI SPRINT BACKLOG' name="lock" class="btn btn-danger btn-block"> -->
        <button type="submit" name="lock" class="btn btn-danger btn-block"><i class="fa fa-fw fa-lock"></i>TUTUP SPRINT #<?= $sprint->sprint_number ?></button>
    </div>

</div>
<?php
}else {

    $yourrole = \backend\models\ProjectMember::getYourRole($sprint->id_project, 2); 
    $po_role = \backend\models\AppSettingSearch::getValueByKey("ROLE PRODUCT OWNER");
    if($yourrole == $po_role){
    
?>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <!-- <input type="submit" value="BUKA KUNCI SPRINT BACKLOG" name="unlock" class="btn btn-danger btn-block"> -->
        <button type="submit" name="unlock" class="btn btn-danger btn-block"><i class="fa fa-fw fa-unlock"></i>BUKA KEMBALI SPRINT #<?= $sprint->sprint_number ?></button>
    </div>
</div>
<?php
    }
}
?>
<?php ActiveForm::end(); ?>
</div>