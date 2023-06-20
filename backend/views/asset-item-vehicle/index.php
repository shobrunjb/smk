<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemVehicleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asset Item Vehicle';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body asset-item-vehicle-index">


        <p>
            <?= Html::a('Tambah Asset Item Vehicle', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [

                [
                    'header' => 'No',
                    'class' => 'yii\grid\SerialColumn',
                    'contentOptions' => ['style' => 'vertical-align: top; ', 'class' => 'text-center'],

                ],
                [
                    //'label' => 'Supplier Name',
                    'attribute' => 'assetMaster.asset_name',
                    'contentOptions' => ['style' => 'width:350px;  min-width:300px;  '],
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_supplier', $datalist, ['class' => 'form-control']),
                ],
                'number1',
                'number2',

                // 'number3',
                // 'kode_barcode',
                // 'qrcode',
                //'link_code',
                //'picture1',
                //'picture2',
                //'picture3',
                //'picture4',
                //'picture5',
                //'caption_picture1',
                //'caption_picture2',
                //'caption_picture3',
                //'caption_picture4',
                //'caption_picture5',
                //'label1',
                //'label2',
                //'label3',
                //'label4',
                //'label5',
                //'file1',
                //'file2',
                //'file3',
                //'status_active',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>