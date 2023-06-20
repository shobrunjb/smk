<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkPegawaiTahunanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="smk-pegawai-tahunan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_smk_pegawai_tahunan') ?>

    <?= $form->field($model, 'type_periode') ?>

    <?= $form->field($model, 'id_smk_periode') ?>

    <?= $form->field($model, 'year') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?php // echo $form->field($model, 'id_smk_pegawai_tahunan_parent') ?>

    <?php // echo $form->field($model, 'rev_no') ?>

    <?php // echo $form->field($model, 'id_hrm_organization_structure') ?>

    <?php // echo $form->field($model, 'id_hrm_organization_position') ?>

    <?php // echo $form->field($model, 'id_pegawai_atasan') ?>

    <?php // echo $form->field($model, 'id_hrm_organization_position_atasan') ?>

    <?php // echo $form->field($model, 'id_hrm_kantor') ?>

    <?php // echo $form->field($model, 'plan_is_changed') ?>

    <?php // echo $form->field($model, 'planchange_is_approved') ?>

    <?php // echo $form->field($model, 'planchange_notes') ?>

    <?php // echo $form->field($model, 'plan_is_approved') ?>

    <?php // echo $form->field($model, 'plan_approval_date') ?>

    <?php // echo $form->field($model, 'plan_approval_id_pegawai') ?>

    <?php // echo $form->field($model, 'plan_approval_ip_address') ?>

    <?php // echo $form->field($model, 'plan_approval_notes') ?>

    <?php // echo $form->field($model, 'bimb_is_approved') ?>

    <?php // echo $form->field($model, 'bimb_approval_date') ?>

    <?php // echo $form->field($model, 'bimb_approval_id_pegawai') ?>

    <?php // echo $form->field($model, 'bimb_approval_ip_address') ?>

    <?php // echo $form->field($model, 'bimb_approval_notes') ?>

    <?php // echo $form->field($model, 'is_approved') ?>

    <?php // echo $form->field($model, 'approval_date') ?>

    <?php // echo $form->field($model, 'approval_id_pegawai') ?>

    <?php // echo $form->field($model, 'approval_ip_address') ?>

    <?php // echo $form->field($model, 'approval_notes') ?>

    <?php // echo $form->field($model, 'nilai_point') ?>

    <?php // echo $form->field($model, 'nilai_angka') ?>

    <?php // echo $form->field($model, 'keterangan_nilai') ?>

    <?php // echo $form->field($model, 'bmb_nilai_point') ?>

    <?php // echo $form->field($model, 'bmb_nilai_angka') ?>

    <?php // echo $form->field($model, 'bmb_keterangan_nilai') ?>

    <?php // echo $form->field($model, 'final_nilai_point') ?>

    <?php // echo $form->field($model, 'final_nilai_angka') ?>

    <?php // echo $form->field($model, 'final_keterangan_nilai') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'plan_status_completed') ?>

    <?php // echo $form->field($model, 'bimb_status_completed') ?>

    <?php // echo $form->field($model, 'final_status_completed') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'filename') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
