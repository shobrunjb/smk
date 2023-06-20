<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvLanguageSkillSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-cv-language-skill-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_language_skill') ?>

    <?= $form->field($model, 'code_id') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'bahasa') ?>

    <?= $form->field($model, 'id_mst_bahasa') ?>

    <?php // echo $form->field($model, 'tingkat_keahlian') ?>

    <?php // echo $form->field($model, 'punya_sertifikat') ?>

    <?php // echo $form->field($model, 'sertifikat') ?>

    <?php // echo $form->field($model, 'foto_sertifikat') ?>

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
