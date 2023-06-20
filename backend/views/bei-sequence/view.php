<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiSequence */

$this->title = $model->id_bei_sequence;
$this->params['breadcrumbs'][] = ['label' => 'Sequence', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bei-sequence-view box box-primary">

    <div class="box-header">
       
        <?= Html::a('Update', ['update', 'id' => $model->id_bei_sequence], ['class' => 'btn btn-primary']) ?>
        <?php /* <?= Html::a('Delete', ['delete', 'id' => $model->id_bei_sequence], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */ ?>

    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id_bei_sequence',
                'sequence_name',
                'is_active',
            ],
        ]) ?>

    </div>
</div>
