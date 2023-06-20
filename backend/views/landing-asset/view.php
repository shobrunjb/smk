<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\LaporanPublik */

//$this->title = $model->id_landing_asset;
$this->title = 'Detail '.'Landing Asset';
$this->params['breadcrumbs'][] = ['label' => 'Landing Asset', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$basepath = Yii::$app->request->baseUrl;
?>
<div class="box">
    <div class="box-body informasi-publik-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_landing_asset], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_landing_asset], [
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
                    //'nomor',
                    
                    [
                        'attribute' => 'id_jenis_laporan',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->jenisLaporan)) {
                                return $data->jenisLaporan->jenis_laporan;
                            } else {
                                return "--";
                            }
                        },
                        //'filter'=>Html::activeDropDownList($searchModel, 'id_jenis_laporan', $datalistJenisLaporan, ['class' => 'form-control']),
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
                    'nomor',
                    'judul',

                    //'icon',
                    /*
                    [
                        'label' => 'Icon',
                        'format' => 'raw',
                        'value' => function ($data) use ($basepath) {
                            $imgpath = $data->icon;
                            if ($data->icon != "") {
                                //return '<img class="img-responsive" width="100px" src="' . $basepath . '/uploads/LaporanPublik-icon/' . $imgpath . '" alt="Foto"/>';
                               return '<img src="'.'../..'.'/frontend/web/file/laporan-publik-icon/'.$imgpath.'" class="img-responsive" width="150px" alt="Foto"> ';
                            } else {
                                return "No Icon";
                            }
                        }
                    ],
                    */
                    'triwulan',
                    'tahun',

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
                                    $fullpath = '../..'.'/frontend/web/file/laporan-publik/' . $filepath ;
                                    if(file_exists($fullpath)){
                                       return '<a href="'.'../..'.'/frontend/web/file/laporan-publik/' . $filepath . '" class="btn btn-info" style="padding: 0px 5px;">Akses<a>';
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
                //'created_date',
                //'created_ip_address',
            
            ],
        ]) ?>

    </div>
</div>
