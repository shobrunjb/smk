<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\BeiMstCategoryPredefQuest;
use backend\common\labeling\CommonActionLabelEnum;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiPredefinedQuestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bei-predefined-question-form box box-primary">

    <?php $form = ActiveForm::begin(); ?>

<div class="box-body table-responsive">
        <div class="col-md-12">

    <?= $form->field($model, 'question_ind')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'question_eng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?php 
    $batch=BeiMstCategoryPredefQuest::find()->all();
    $listData=ArrayHelper::map($batch,'id_bei_mst_category_predef_quest','category_predef_quest');
    echo $form->field($model, 'id_bei_mst_category_predef_quest')->widget(\kartik\select2\Select2::classname(), [
        'data' => $listData,
        'options' => ['placeholder' => '--Pilih--'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); 
    ?>


 </div>
    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
