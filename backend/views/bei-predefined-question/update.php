<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiPredefinedQuestion */

$this->title = 'Update Daftar Pertanyaan Kompetensi: ' . $model->id_bei_predefined_question;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pertanyaan Kompetensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bei_predefined_question, 'url' => ['view', 'id' => $model->id_bei_predefined_question]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bei-predefined-question-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
