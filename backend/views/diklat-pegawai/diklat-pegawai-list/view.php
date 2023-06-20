<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DiklatPegawaiList */

//$this->title = $model->id_peserta;
$this->title = 'Detail '.'Diklat Pegawai List';
$this->params['breadcrumbs'][] = ['label' => 'Diklat Pegawai List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body diklat-pegawai-list-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_peserta], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_peserta], [
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
                ],
        ]) ?>

    </div>
</div>
