<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewSession */

$this->title = 'Update Sesi Interview: ' . $model->id_bei_interview_session;
$this->params['breadcrumbs'][] = ['label' => 'Sesi Interview', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bei_interview_session, 'url' => ['view', 'id' => $model->id_bei_interview_session]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bei-interview-session-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
