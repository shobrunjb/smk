<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiCompentecyQuestion */

$this->title = 'Update Kompetensi: ' . $model->competency->competeny_dimension_ind;
$this->params['breadcrumbs'][] = ['label' => 'Pertanyaan Kompetensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bei_compentecy_question, 'url' => ['view', 'id' => $model->id_bei_compentecy_question]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bei-compentecy-question-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
