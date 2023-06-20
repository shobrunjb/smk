<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemVehicle */

//$this->title = $model->id_asset_item;
$this->title = 'Detail '.'Asset Item Vehicle';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Vehicle', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body asset-item-vehicle-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_asset_item], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_asset_item], [
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
                'number1',
            'number2',
            'number3',
            'kode_barcode',
            'qrcode',
            'link_code',
            'picture1',
            'picture2',
            'picture3',
            'picture4',
            'picture5',
            'caption_picture1',
            'caption_picture2',
            'caption_picture3',
            'caption_picture4',
            'caption_picture5',
            'label1',
            'label2',
            'label3',
            'label4',
            'label5',
            'file1',
            'file2',
            'file3',
            'status_active',
            ],
        ]) ?>

    </div>
</div>
