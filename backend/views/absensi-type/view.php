<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AbsensiType */

//$this->title = $model->id_absensi_type;
$this->title = 'Detail '.'Absensi Type';
$this->params['breadcrumbs'][] = ['label' => 'Absensi Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body absensi-type-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_absensi_type], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_absensi_type], [
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
                'absensi_type',
            'keterangan',
            ],
        ]) ?>

    </div>
</div>
