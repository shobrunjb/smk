<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HrmCompetencyDimensionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-competency-dimension-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_hrm_competency_dimension') ?>

    <?= $form->field($model, 'id_hrm_competency_cluster') ?>

    <?= $form->field($model, 'id_hrm_competency_category') ?>

    <?= $form->field($model, 'competeny_dimension_eng') ?>

    <?= $form->field($model, 'no') ?>

    <?php // echo $form->field($model, 'abbr_eng') ?>

    <?php // echo $form->field($model, 'description_eng') ?>

    <?php // echo $form->field($model, 'keywords_eng') ?>

    <?php // echo $form->field($model, 'competeny_dimension_ind') ?>

    <?php // echo $form->field($model, 'abbr_ind') ?>

    <?php // echo $form->field($model, 'description_ind') ?>

    <?php // echo $form->field($model, 'keywords_ind') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
