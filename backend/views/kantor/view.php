<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kantor */

//$this->title = $model->id_kantor;
$this->title = 'Detail '.'Kantor';
$this->params['breadcrumbs'][] = ['label' => 'Kantor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body kantor-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_kantor], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_kantor], [
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
                'nama_kantor',
                'alamat',
                [
                    'attribute' => 'id_kabupaten',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        if (isset($data->kabupaten)) {
                            return $data->kabupaten->nama_kabupaten;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_kabupaten', $dataListEnvironment, ['class' => 'form-control', 'prompt' => '-Pilih Environment-']),
                ],
                'longitude',
                'latitude',
                'keterangan',
            ],
        ]) ?>

    </div>
</div>
