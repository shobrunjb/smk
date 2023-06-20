<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Jabatan */

//$this->title = $model->id_jabatan;
$this->title = 'Detail '.'Jabatan';
$this->params['breadcrumbs'][] = ['label' => 'Jabatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body jabatan-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_jabatan], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_jabatan], [
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
                'kode_jabatan',
            'nama_jabatan',
            'keterangan',
            ],
        ]) ?>

    </div>
</div>
