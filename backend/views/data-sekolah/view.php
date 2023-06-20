<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DataSekolah */

//$this->title = $model->id_sekolah;
$this->title = 'Detail '.'Data Sekolah';
$this->params['breadcrumbs'][] = ['label' => 'Data Sekolah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body data-sekolah-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_sekolah], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_sekolah], [
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
            'nama_sekolah',
            'nama_sekolah_short',
            'alamat_sekolah',
            'is_valid',
            ],
        ]) ?>

    </div>
</div>
