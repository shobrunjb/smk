<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewSequence */

//$this->title = $model->id_bei_interview_sequence;
$this->title = 'Detail '.'Bei Interview Sequence';
$this->params['breadcrumbs'][] = ['label' => 'Bei Interview Sequence', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body bei-interview-sequence-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_bei_interview_sequence], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_bei_interview_sequence], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'no',
            ],
        ]) ?>

    </div>
</div>
