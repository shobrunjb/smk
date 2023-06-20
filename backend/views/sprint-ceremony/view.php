<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SprintCeremony */

//$this->title = $model->id_sprint_ceremony;
$this->title = 'Detail '.'Sprint Ceremony';
$this->params['breadcrumbs'][] = ['label' => 'Sprint Ceremony', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body sprint-ceremony-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_sprint_ceremony], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_sprint_ceremony], [
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
                'ceremony',
            'noted:ntext',
            'external_notes1',
            'external_notes2',
            'external_notes3',
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
