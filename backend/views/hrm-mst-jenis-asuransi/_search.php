<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmMstJenisAsuransiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-mst-jenis-asuransi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_hrm_mst_jenis_asuransi') ?>

    <?= $form->field($model, 'jenis_asuransi') ?>

    <?= $form->field($model, 'active_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
