<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
?>

<?php
//$form = ActiveForm::begin();
    $form = ActiveForm::begin([
        //'action' => [Url::current().'#url']
        'method' => 'POST'
    ]);
?>
<?php
    if($project->backlog_is_locked != 2){
?>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <!-- <input type="submit" value='SETUJUI & KUNCI PRODUCT BACKLOG' name="lock" class="btn btn-danger btn-block"> -->
        <button type="submit" name="lock" class="btn btn-danger btn-block"><i class="fa fa-fw fa-lock"></i>SETUJUI & KUNCI PRODUCT BACKLOG</button>
    </div>
</div>
<?php
}else {
    $yourrole = \backend\models\ProjectMember::getYourRole($project->id_project, 2); 
    $po_role = \backend\models\AppSettingSearch::getValueByKey("ROLE PRODUCT OWNER");
    if($yourrole == $po_role){
?>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <!-- <input type="submit" value="BUKA KUNCI PRODUCT BACKLOG" name="unlock" class="btn btn-danger btn-block"> -->
        <button type="submit" name="unlock" class="btn btn-danger btn-block"><i class="fa fa-fw fa-unlock"></i>BUKA KUNCI PRODUCT BACKLOG</button>
    </div>
</div>
<?php
    }
}
?>
<?php ActiveForm::end(); ?>