<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmKantor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-kantor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_perusahaan')->textInput() ?>

    <?= $form->field($model, 'nama_kantor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_hrm_kantor_parent')->textInput() ?>

    <?= $form->field($model, 'id_kantor_kategori')->textInput() ?>

    <?= $form->field($model, 'alamat_kantor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kabupaten')->textInput() ?>

    <?= $form->field($model, 'id_propinsi')->textInput() ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
