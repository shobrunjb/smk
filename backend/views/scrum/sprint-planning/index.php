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
    if($sprint->is_locked != 2){
        echo 'Silakan pilih (check /centang) product backlog mana saja yang akan dimasukkan sebagai sebagai backlog di SPRINT #'.$sprint->sprint_number.". <br>Setelah itu pilih tombol SIMPAN untuk menyimpan data-data pada sprint planning";
        $readonly = false;
    }else{
        echo '<i class="fa fa-fw fa-lock"></i>'.' Sprint backlog sudah terkunci. Jika ingin mengubah, silakan hubungi PRODUCT OWNER anda';
        $readonly = true;
    }
?>
</div>

<?php
    $session = Yii::$app->session;                             
    
    if(isset($session['error-planning'])){
        $errors =$session['error-planning'];
        if(count($errors) > 0){
            echo '<div class="alert alert-danger">';
            foreach($errors as $key=>$value){
                echo $value."<br>";
            }
            echo '</div>';
        }

        //Remove setelah didisplay
        $error = array();
        $session->set('error-planning', $error);
    }
?>

<?php
    if($sprint->is_locked != 2){
?>
<h4>A. Pilih dari Backlog yang belum di-assign</h4>
<?php
}
?>
<table class="table table-hover">
<tr>
    <?php
        if($sprint->is_locked != 2){
    ?>
    <th>Pilih</th>
    <?php
    }
    ?>
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
        'itemView' => '_item_product_backlog',
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
                'readonly' => $readonly,
        ],
        'summary'=>'',
    ]);
?>

</table>
<?php
    if($sprint->is_locked != 2){
?>
<?php /*
<h4>B. Pilih dari Backlog yang belum selesai dari sprint sebelumnya</h4>
<div class="alert alert-warning">Belum ada data</div>
*/ ?>
    <?= $this->render('_previous_table', [
            'sprint' => $sprint,
            't' => $t,
            'i' => $i,
            'idi' => $idi,
            'action' => $action,
            'readonly' => $readonly,
        ]) ?>
<?php
}
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
?>
<?php ActiveForm::end(); ?>
</div>