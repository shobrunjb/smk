<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HrmCompetencyDimension */

$this->title = 'Update Jenis Kompetensi: ' . $model->competeny_dimension_ind;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Kompetensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_hrm_competency_dimension, 'url' => ['view', 'id' => $model->id_hrm_competency_dimension]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hrm-competency-dimension-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
