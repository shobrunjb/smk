<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiPredefinedQuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bei-predefined-question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_bei_predefined_question') ?>

    <?= $form->field($model, 'question_ind') ?>

    <?= $form->field($model, 'question_eng') ?>

    <?= $form->field($model, 'number') ?>

    <?= $form->field($model, 'id_bei_mst_category_predef_quest') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
