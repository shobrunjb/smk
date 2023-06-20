<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HrmKantorKategoriSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-kantor-kategori-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_hrm_kantor_kategori') ?>

    <?= $form->field($model, 'kategori') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?= $form->field($model, 'id_parent_kategori') ?>

    <?= $form->field($model, 'is_used') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
