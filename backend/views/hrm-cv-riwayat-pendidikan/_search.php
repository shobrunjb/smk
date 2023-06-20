<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvRiwayatPendidikanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-cv-riwayat-pendidikan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_riwayat_pendidikan') ?>

    <?= $form->field($model, 'code_id') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'id_mst_tingkat_pendidikan') ?>

    <?= $form->field($model, 'id_sekolah') ?>

    <?php // echo $form->field($model, 'dari') ?>

    <?php // echo $form->field($model, 'sampai') ?>

    <?php // echo $form->field($model, 'id_jurusan') ?>

    <?php // echo $form->field($model, 'grade') ?>

    <?php // echo $form->field($model, 'foto_ijazah') ?>

    <?php // echo $form->field($model, 'foto_transkrip') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <?php // echo $form->field($model, 'modified_user') ?>

    <?php // echo $form->field($model, 'modified_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
