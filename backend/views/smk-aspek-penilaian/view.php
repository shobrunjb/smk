<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkAspekPenilaian */

//$this->title = $model->id_aspek_penilaian;
$this->title = 'Detail '.'Aspek Penilaian';
$this->params['breadcrumbs'][] = ['label' => 'Smk Aspek Penilaian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body smk-aspek-penilaian-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_aspek_penilaian], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_aspek_penilaian], [
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
                'aspek_penilaian',
            'deskripsi',
            'kategori',
            'mode',
            'is_used',
            ],
        ]) ?>

    </div>
</div>
