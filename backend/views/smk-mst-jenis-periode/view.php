<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkMstJenisPeriode */

//$this->title = $model->id_smk_mst_jenis_periode;
$this->title = 'Detail '.'Jenis Periode';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Periode', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body smk-mst-jenis-periode-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_smk_mst_jenis_periode], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_smk_mst_jenis_periode], [
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
                'jenis_periode',
            'jumlah',
            'deskripsi',
            'is_used',
            ],
        ]) ?>

    </div>
</div>
