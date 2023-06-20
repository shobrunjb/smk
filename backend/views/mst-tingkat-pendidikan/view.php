<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MstTingkatPendidikan */

//$this->title = $model->id_mst_tingkat_pendidikan;
$this->title = 'Detail '.'Tingkat Pendidikan';
$this->params['breadcrumbs'][] = ['label' => 'Tingkat Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body mst-tingkat-pendidikan-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_mst_tingkat_pendidikan], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_mst_tingkat_pendidikan], [
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
                'tingkat_pendidikan',
            'keterangan',
            ],
        ]) ?>

    </div>
</div>
