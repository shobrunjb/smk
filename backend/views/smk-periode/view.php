<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkPeriode */

//$this->title = $model->id_smk_periode;
$this->title = 'Detail '.'Periode Penilaian';
$this->params['breadcrumbs'][] = ['label' => 'Periode Penilaian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body smk-periode-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_smk_periode], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_smk_periode], [
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
                'tahun',
            'periode_no',
            'nama_periode',
            'is_current_periode',
            ],
        ]) ?>

    </div>
</div>
