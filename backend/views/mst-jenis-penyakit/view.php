<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MstJenisPenyakit */

//$this->title = $model->id_mst_jenis_penyakit;
$this->title = 'Detail '.'Jenis Penyakit';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Penyakit', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body mst-jenis-penyakit-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_mst_jenis_penyakit], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_mst_jenis_penyakit], [
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
                'jenis_penyakit',
            'keterangan',
            ],
        ]) ?>

    </div>
</div>
