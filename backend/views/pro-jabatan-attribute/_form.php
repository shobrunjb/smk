<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProJabatanAttribute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pro-jabatan-attribute-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jabatan')->textInput() ?>

    <?= $form->field($model, 'id_mst_jabatan_attribute')->textInput() ?>

    <?= $form->field($model, 'id_mst_jabatan_attribute_grade')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
