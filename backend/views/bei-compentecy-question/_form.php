<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use yii\helpers\ArrayHelper;

use backend\models\HrmCompetencyDimension;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiCompentecyQuestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bei-compentecy-question-form box box-primary">

    <?php $form = ActiveForm::begin(); ?>

<div class="box-body table-responsive">
        <div class="col-md-12">

    <?php
    $competency=HrmCompetencyDimension::find()->where(['id_hrm_competency_cluster'=>301])->all();
    $listData=ArrayHelper::map($competency,'id_hrm_competency_dimension','competeny_dimension_ind');
    echo $form->field($model, 'id_hrm_competency_dimension')->widget(\kartik\select2\Select2::classname(), [
        'data' => $listData,
        'options' => ['placeholder' => '--Pilih--'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); 
    ?>

    <?php // $form->field($model, 'id_hrm_competency_dimension')->textInput() ?>

    <?= $form->field($model, 'question_ind')->textarea(['rows'=> '4']) ?>

    <?= $form->field($model, 'question_eng')->textarea(['rows'=> '4']) ?>

    <?= $form->field($model, 'number')->textInput(['type' => 'number']) ?>


 </div>
    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
