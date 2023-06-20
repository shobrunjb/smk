<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductBacklogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-backlog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_product_backlog') ?>

    <?= $form->field($model, 'id_project_mst_type') ?>

    <?= $form->field($model, 'id_project') ?>

    <?= $form->field($model, 'order_number') ?>

    <?= $form->field($model, 'product_backlog') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'id_wiki_page') ?>

    <?php // echo $form->field($model, 'external_information') ?>

    <?php // echo $form->field($model, 'priority') ?>

    <?php // echo $form->field($model, 'load_estimatation') ?>

    <?php // echo $form->field($model, 'id_time_metric') ?>

    <?php // echo $form->field($model, 'id_sprint') ?>

    <?php // echo $form->field($model, 'progres_by_team') ?>

    <?php // echo $form->field($model, 'progres_by_owner') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
