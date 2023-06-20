<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewBacthSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bei-interview-bacth-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_bei_interview_batch') ?>

    <?= $form->field($model, 'nama_batch') ?>

    <?= $form->field($model, 'jumlah_peserta') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?= $form->field($model, 'tanggal_mulai') ?>

    <?php // echo $form->field($model, 'tanggal_selesai') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <?php // echo $form->field($model, 'modified_user') ?>

    <?php // echo $form->field($model, 'modified_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
