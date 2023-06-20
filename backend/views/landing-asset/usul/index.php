<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\InformasiPublikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usulan Informasi Publik';
$this->params['breadcrumbs'][] = $this->title;
$basepath = Yii::$app->request->baseUrl;
?>

<?php
$datalistBagian = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\MstBagianInformasi::find()
        //->where(['id_parent_topnav' => 0])
        ->all(), 'id_bagian_informasi', 'nama_bagian');

$datalistJenisInformasi = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\JenisInformasi::find()
        //->where(['id_parent_topnav' => 0])
        ->all(), 'id_jenis_informasi', 'jenis_informasi');

$dataListInduk = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\InformasiPublik::find()->asArray()->where(['id_parent' => 0])->all(), 'id_informasi_publik', 'judul');
?>
<div class="box">
    <div class="box-body informasi-publik-index">

        
        <p>
            <?= Html::a('Tambah Usulan Informasi Publik', ['usul-create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                    //'has_child',
                    [
                        'attribute' => 'id_jenis_informasi',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->jenisInformasi)) {
                                return $data->jenisInformasi->jenis_informasi;
                            } else {
                                return "--";
                            }
                        },
                        'filter'=>Html::activeDropDownList($searchModel, 'id_jenis_informasi', $datalistJenisInformasi, ['class' => 'form-control']),
                    ],
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
                    //'nomor',
                    'judul',

                    //'icon',
                    /*
                    [
                        'label' => 'Icon',
                        'format' => 'raw',
                        'value' => function ($data) use ($basepath) {
                            $imgpath = $data->icon;
                            if ($data->icon != "") {
                                //return '<img class="img-responsive" width="100px" src="' . $basepath . '/uploads/informasipublik-icon/' . $imgpath . '" alt="Foto"/>';
                               return '<img src="'.'../..'.'/frontend/web/file/informasi-publik-icon/'.$imgpath.'" class="img-responsive" width="150px" alt="Foto"> ';
                            } else {
                                return "No Icon";
                            }
                        }
                    ],
                    */
                    
                    'tahun',
                    [
                        'attribute' => 'id_bagian',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->bagian)) {
                                return $data->bagian->nama_bagian;
                            } else {
                                return "--";
                            }
                        },
                        'filter'=>Html::activeDropDownList($searchModel, 'id_bagian', $datalistBagian, ['class' => 'form-control']),
                    ],
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
                                    $fullpath = '../..'.'/frontend/web/file/informasi-publik/' . $filepath ;
                                    if(file_exists($fullpath)){
                                       return '<a href="'.'../..'.'/frontend/web/file/informasi-publik/' . $filepath . '" class="btn btn-info" style="padding: 0px 5px;">Akses<a>';
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
                    'status_approval',
                    //'created_date',
                    //'created_ip_address',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
    
    
    </div>
</div>
