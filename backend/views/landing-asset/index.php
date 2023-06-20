<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LandingAssetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Landing Asset';
$this->params['breadcrumbs'][] = $this->title;
$basepath = Yii::$app->request->baseUrl;
?>

<?php


$datalistJenisLandingAsset = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\JenisLandingAsset::find()
        //->where(['id_parent_topnav' => 0])
        ->all(), 'id_jenis_landing_asset', 'jenis_landing_asset');

$dataListInduk = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\LandingAsset::find()->asArray()->where(['id_parent' => 0])->all(), 'id_landing_asset', 'judul');
?>
<div class="box">
    <div class="box-body landing_asset-index">

        
        <p>
            <?= Html::a('Tambah Landing Asset', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                    //'has_child',
                    [
                        'attribute' => 'id_jenis_landing_asset',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->jenisLandingAsset)) {
                                return $data->jenisLandingAsset->jenis_landing_asset;
                            } else {
                                return "--";
                            }
                        },
                        'filter'=>Html::activeDropDownList($searchModel, 'id_jenis_landing_asset', $datalistJenisLandingAsset, ['class' => 'form-control']),
                    ],
                    /*
                    [
                        'attribute' => 'id_parent',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->parent)) {
                                return $data->parent->judul;
                            } else {
                                return "--";
                            }
                        },
                        'filter'=>Html::activeDropDownList($searchModel, 'id_parent', $dataListInduk, ['class' => 'form-control']),
                    ],
                    */
                    //'nomor',
                    'judul',
                    'file',

                    //'icon',
                    /*
                    [
                        'label' => 'Icon',
                        'format' => 'raw',
                        'value' => function ($data) use ($basepath) {
                            $imgpath = $data->icon;
                            if ($data->icon != "") {
                                //return '<img class="img-responsive" width="100px" src="' . $basepath . '/uploads/LandingAsset-icon/' . $imgpath . '" alt="Foto"/>';
                               return '<img src="'.'../..'.'/frontend/web/file/landing_asset-icon/'.$imgpath.'" class="img-responsive" width="150px" alt="Foto"> ';
                            } else {
                                return "No Icon";
                            }
                        }
                    ],
                    */
                    //'triwulan',
                    /*
                    [
                        'attribute' => 'triwulan',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return $data->triwulan;
                        },
                        'filter'=>Html::activeDropDownList($searchModel, 'triwulan', $dataListTriwulan, ['class' => 'form-control']),
                    ],
                    */
                    //'tahun',

                    //'file',
                    //'type',
                    [
                        'attribute' => 'type',
                        'filter'=>  ['FILE' => 'FILE', 'URL' => 'URL / LINK']
                    ],
                    [
                        'label' => 'Akses Informasi',
                        'format' => 'raw',
                        'value' => function ($data) use ($basepath) {
                            $filepath = $data->file;
                            if($data->type == "FILE"){
                                if ($data->file != "") {
                                    $fullpath = '../..'.'/frontend/web/landing_asset/' . $filepath ;
                                    if(file_exists($fullpath)){
                                       return '<a href="'.'../..'.'/frontend/web/landing_asset/' . $filepath . '" class="btn btn-info" style="padding: 0px 5px;">Akses<a>';
                                    }else{
                                      return "File Tdk ditemukan";
                                    }
                                   // return '<img src="'.'../..'.'/frontend/web/file/galery/'.$imgpath.'" class="img-responsive" width="150px" alt="Foto"> ';
                                } else {
                                    return "File Tidak Ada";
                                }
                            }
                            else if($data->type == "URL"){
                                  return '<a href="'.$data->link_url.'" class="btn btn-success" style="padding: 0px 5px;">Akses<a>';
                            }else{
                                return "-";
                            }
                        }
                    ],
                    [
                        'attribute' => 'is_active',
                        'value' => function ($model) {
                            return $model->is_active == 0 ? 'Not Active' : 'Active';
                        },
                    ],
                    //'created_date',
                    //'created_ip_address',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
    
    
    </div>
</div>
