<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductBacklog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-backlog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_project_mst_type')->textInput() ?>

    <?= $form->field($model, 'id_project')->textInput() ?>

    <?= $form->field($model, 'order_number')->textInput() ?>

    <?= $form->field($model, 'product_backlog')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_wiki_page')->textInput() ?>

    <?= $form->field($model, 'external_information')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'priority')->textInput() ?>

    <?= $form->field($model, 'load_estimatation')->textInput() ?>

    <?= $form->field($model, 'id_time_metric')->textInput() ?>

    <?= $form->field($model, 'id_sprint')->textInput() ?>

    <?= $form->field($model, 'progres_by_team')->textInput() ?>

    <?= $form->field($model, 'progres_by_owner')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
