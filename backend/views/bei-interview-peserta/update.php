<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewPeserta */

$this->title = 'Update bei-interview-peserta: ' . $model->id_bei_interview_peserta;
$this->params['breadcrumbs'][] = ['label' => 'bei-interview-pesertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bei_interview_peserta, 'url' => ['view', 'id' => $model->id_bei_interview_peserta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bei-interview-peserta-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
