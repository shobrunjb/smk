<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\TypeAsset1;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetMasterVehicleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CommonActionLabelEnum::LIST_ALL . ' ' . AppVocabularySearch::getValueByKey('Asset Master Vehicle');
$this->params['breadcrumbs'][] = $this->title;
$dataList1 = ['' => 'Choose'] + ArrayHelper::map(TypeAsset1::find()->all(), 'id_type_asset', 'type_asset');
?>
<div class="box">
    <div class="box-body asset-master-vehicle-index">


        <p>
            <?= Html::a('Tambah Asset Master Vehicle', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'asset_name',
                'asset_code',
                [
                    'attribute' => 'typeAsset1.type_asset',
                    'filter' => Html::activeDropDownList($searchModel, 'id_type_asset1', $dataList1, ['class' => 'form-control']),
                ],
                // 'attribute1',
                // 'attribute2',
                // 'attribute3',
                //'attribute4',
                //'attribute5',
                'deskripsi',
                // 'status',
                //'number_series',
                //'date',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>