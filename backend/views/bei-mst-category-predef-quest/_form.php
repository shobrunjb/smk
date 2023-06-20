<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiMstCategoryPredefQuest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bei-mst-category-predef-quest-form box box-primary">

    <?php $form = ActiveForm::begin(); ?>

<div class="box-body table-responsive">
        <div class="col-md-12">

    <?= $form->field($model, 'category_predef_quest')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'is_active')->dropDownList(
            ['1' => 'YES', '0' => 'NO'],['prompt'=>'--PIlih--']
            ) ?>


 </div>
    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
