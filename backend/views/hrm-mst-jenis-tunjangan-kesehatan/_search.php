<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmMstJenisTunjanganKesehatanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-mst-jenis-tunjangan-kesehatan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_mst_jenis_tunjangan_kesehatan') ?>

    <?php // $form->field($model, 'id_perusahaan') ?>

    <?= $form->field($model, 'jenis_tunjangan_kesehatan') ?>

    <?= $form->field($model, 'is_used') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
