<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MstPersonalAttributeGradeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mst-personal-attribute-grade-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_mst_personal_attribute_grade') ?>

    <?= $form->field($model, 'id_mst_personal_attribute') ?>

    <?= $form->field($model, 'grade_label') ?>

    <?= $form->field($model, 'grade_value') ?>

    <?= $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
