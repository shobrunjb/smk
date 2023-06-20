<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkPegawaiTahunan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="smk-pegawai-tahunan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_periode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_smk_periode')->textInput() ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'id_pegawai')->textInput() ?>

    <?= $form->field($model, 'id_smk_pegawai_tahunan_parent')->textInput() ?>

    <?= $form->field($model, 'rev_no')->textInput() ?>

    <?= $form->field($model, 'id_hrm_organization_structure')->textInput() ?>

    <?= $form->field($model, 'id_hrm_organization_position')->textInput() ?>

    <?= $form->field($model, 'id_pegawai_atasan')->textInput() ?>

    <?= $form->field($model, 'id_hrm_organization_position_atasan')->textInput() ?>

    <?= $form->field($model, 'id_hrm_kantor')->textInput() ?>

    <?= $form->field($model, 'plan_is_changed')->textInput() ?>

    <?= $form->field($model, 'planchange_is_approved')->textInput() ?>

    <?= $form->field($model, 'planchange_notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'plan_is_approved')->textInput() ?>

    <?= $form->field($model, 'plan_approval_date')->textInput() ?>

    <?= $form->field($model, 'plan_approval_id_pegawai')->textInput() ?>

    <?= $form->field($model, 'plan_approval_ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plan_approval_notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'bimb_is_approved')->textInput() ?>

    <?= $form->field($model, 'bimb_approval_date')->textInput() ?>

    <?= $form->field($model, 'bimb_approval_id_pegawai')->textInput() ?>

    <?= $form->field($model, 'bimb_approval_ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bimb_approval_notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_approved')->textInput() ?>

    <?= $form->field($model, 'approval_date')->textInput() ?>

    <?= $form->field($model, 'approval_id_pegawai')->textInput() ?>

    <?= $form->field($model, 'approval_ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approval_notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nilai_point')->textInput() ?>

    <?= $form->field($model, 'nilai_angka')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan_nilai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bmb_nilai_point')->textInput() ?>

    <?= $form->field($model, 'bmb_nilai_angka')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bmb_keterangan_nilai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'final_nilai_point')->textInput() ?>

    <?= $form->field($model, 'final_nilai_angka')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'final_keterangan_nilai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plan_status_completed')->textInput() ?>

    <?= $form->field($model, 'bimb_status_completed')->textInput() ?>

    <?= $form->field($model, 'final_status_completed')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
