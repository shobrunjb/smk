<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HrmCompetencyDimension */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-body hrm-competency-dimension-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //= $form->field($model, 'id_hrm_competency_cluster')->textInput() ?>

    <?php //= $form->field($model, 'id_hrm_competency_category')->textInput() ?>

   

    <?= $form->field($model, 'no')->textInput() ?>

    <div class="box box-primary">

        <?= $form->field($model, 'competeny_dimension_ind')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'abbr_ind')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description_ind')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'keywords_ind')->textInput(['maxlength' => true]) ?>

    </div>

    <div class="box box-primary">
        <?= $form->field($model, 'competeny_dimension_eng')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'abbr_eng')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description_eng')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'keywords_eng')->textInput(['maxlength' => true]) ?>

    </div>
    

    

    

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
