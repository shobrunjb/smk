<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DataJurusan */

//$this->title = $model->id_jurusan;
$this->title = 'Detail '.'Data Jurusan';
$this->params['breadcrumbs'][] = ['label' => 'Data Jurusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body data-jurusan-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_jurusan], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_jurusan], [
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
                'nama_jurusan_id',
            'nama_jurusan_en',
            'status',
            ],
        ]) ?>

    </div>
</div>
