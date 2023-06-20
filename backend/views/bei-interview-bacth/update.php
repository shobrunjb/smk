<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewBacth */

$this->title = 'Update Interview Bacth: ' . $model->id_bei_interview_batch;
$this->params['breadcrumbs'][] = ['label' => 'bei-interview-bacths', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bei_interview_batch, 'url' => ['view', 'id' => $model->id_bei_interview_batch]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bei-interview-bacth-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
