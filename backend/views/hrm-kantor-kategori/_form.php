<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HrmKantorKategori */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-kantor-kategori-form box box-primary">

    <?php $form = ActiveForm::begin(); ?>

<div class="box-body table-responsive">
        <div class="col-md-12">

    <?= $form->field($model, 'kategori')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_parent_kategori')->textInput() ?>

    <?= $form->field($model, 'is_used')->textInput() ?>


 </div>
    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
