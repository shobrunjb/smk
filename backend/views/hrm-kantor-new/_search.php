<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmKantorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-kantor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_hrm_kantor') ?>

    <?= $form->field($model, 'id_perusahaan') ?>

    <?= $form->field($model, 'nama_kantor') ?>

    <?= $form->field($model, 'id_hrm_kantor_parent') ?>

    <?= $form->field($model, 'id_kantor_kategori') ?>

    <?php // echo $form->field($model, 'alamat_kantor') ?>

    <?php // echo $form->field($model, 'id_kabupaten') ?>

    <?php // echo $form->field($model, 'id_propinsi') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'telepon') ?>

    <?php // echo $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
