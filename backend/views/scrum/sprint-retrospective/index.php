<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$urld = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t]);
?>
<div class="box-body <?php /*table-responsive*/ ?> no-pediting">
<?php
//$form = ActiveForm::begin();
    $form = ActiveForm::begin([
        'action' => $urld,
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
        echo 'Silakan berikan catatan untuk sprint Retrospective di SPRINT #'.$sprint->sprint_number.". <br>";
        $readonly = true;
    }else{
        echo '<i class="fa fa-fw fa-lock"></i>'.' Sprint sudah ditutup. Anda hanya bisa melihat saja terkait datanya!';
        $readonly = true;
    }
?>
</div>

<div class="box-header ">
<div class="box-tools pull-right">
<?php
$urld = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t]);
$url_edit = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t, 'm' => 'edit', 's'=>1]);
  $m = isset($_GET['m']) ? $_GET['m'] : "";
  if($sprint->is_closed != 2){
      if($m == "edit"){
        echo  '<a href="'.$urld.'" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Cancel</a>';
        if($sprint->is_closed != 2){
            $readonly = false;
        }
      }else{
        echo  '<a href="'.$url_edit.'" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Ubah Retrospective</a>';
      }
    }
?>
</div>
</div>

<?php
    if(!$readonly){
?>
<div class="form-group">
<label>Catatan Untuk Sprint Retrospective</label>
<textarea name="noted" class="form-control" rows="3" placeholder="Silakan berikan catatan untuk sprint Retrospective ..."><?= $noted ?></textarea>
</div>
<div class="form-group">
<label>Catatan Tambahan Lain (Link Bukti Kegiatan)</label>
<textarea name="external_notes1" class="form-control" rows="1" placeholder="Catatan tambahan lain ..."><?= $external_notes1 ?></textarea>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="submit" value="SIMPAN" name="saveall" class="btn btn-success btn-block">
    </div>
    <?php /*
    <div class="col-md-6 col-sm-6 col-xs-12">
        <!-- <input type="submit" value='SETUJUI & KUNCI SPRINT BACKLOG' name="lock" class="btn btn-danger btn-block"> -->
        <button type="submit" name="lock" class="btn btn-danger btn-block"><i class="fa fa-fw fa-lock"></i>SETUJUI & KUNCI SPRINT BACKLOG</button>
    </div>
    */ ?>
</div>
<?php
}else {
    echo '<label>Catatan Untuk Sprint Retrospective</label>';
    echo '<div class="box-footer box-comments border border-primary">'.$noted.'</div>';
    echo '<label>Catatan Tambahan Lain (Link Bukti Kegiatan)</label>';
    echo '<div class="box-footer box-comments border border-primary">'.$external_notes1.'</div>';
    //$yourrole = \backend\models\ProjectMember::getYourRole($sprint->id_project, 2); 
    //$po_role = \backend\models\AppSettingSearch::getValueByKey("ROLE PRODUCT OWNER");
    
?>

<?php
}
?>
<?php ActiveForm::end(); ?>
</div>