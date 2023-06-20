<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<div class="box-body <?php /*table-responsive*/ ?> no-padding">
<div class="alert alert-info">
<?php
    echo 'Berikut ini adalah sprint backlog untuk SPRINT #'.$sprint->sprint_number.".";

?>
</div>

<table class="table table-hover">
<tr>

    <th>No</th>
    <th>Product Backlog</th>
    <th>Estimasi</th>
    <th>Progres</th>
    <th>Label</th>
    <th>SPRINT</th>
</tr>

<?php
echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item_sprint_backlog',
        'options' => [
                    //'tag' => 'ul',
                    'class' => 'list-view'
        ],
        'itemOptions' => [
            //'tag' => 'li',
            'class' => 'item',
        ],
        'viewParams' => [
                'action'=>$action,
                't' => $t,
                'i' =>$i,
                'idi'=>$idi,
                'sprint' =>$sprint,
                'readonly' => true,
        ],
        'summary'=>'',
    ]);
?>

</table>


</div>
<?php
//$form = ActiveForm::begin();
    $form = ActiveForm::begin([
        //'action' => [Url::current().'#url']
        'method' => 'POST'
    ]);
?>
<?php
    if($sprint->is_locked != 2){
?>
<div class="form-group">
<label>Catatan Untuk Sprint Planning</label>
<textarea name="noted" class="form-control" rows="3" placeholder="Silakan berikan catatan untuk sprint planning ..."><?= $noted ?></textarea>
</div>

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="submit" value="SIMPAN" name="saveall" class="btn btn-success btn-block">
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <!-- <input type="submit" value='SETUJUI & KUNCI SPRINT BACKLOG' name="lock" class="btn btn-danger btn-block"> -->
        <button type="submit" name="lock" class="btn btn-danger btn-block"><i class="fa fa-fw fa-lock"></i>SETUJUI & KUNCI SPRINT BACKLOG</button>
    </div>
</div>
<?php
}else {
    echo '<label>Catatan Untuk Sprint Planning</label>';
    echo '<div class="box-footer box-comments border border-primary">'.$noted.'</div>';
    $yourrole = \backend\models\ProjectMember::getYourRole($sprint->id_project, 2); 
    $po_role = \backend\models\AppSettingSearch::getValueByKey("ROLE PRODUCT OWNER");
    if($yourrole == $po_role){
        if($sprint->is_closed != 2){
?>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <!-- <input type="submit" value="BUKA KUNCI SPRINT BACKLOG" name="unlock" class="btn btn-danger btn-block"> -->
        <button type="submit" name="unlock" class="btn btn-danger btn-block"><i class="fa fa-fw fa-unlock"></i>BUKA KUNCI SPRINT BACKLOG</button>
    </div>
</div>
<?php
        }
    }
}
?>
<?php ActiveForm::end(); ?>