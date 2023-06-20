<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HrmCvRiwayatPendidikanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Riwayat Pendidikan';
$this->params['breadcrumbs'][] = $this->title;
$basepath = Yii::$app->request->baseUrl;
?>
<div class="box">
    <div class="box-body hrm-cv-riwayat-pendidikan-index">

        
        <p>
            <?= Html::a('Tambah Riwayat Pendidikan', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'code_id',
                [
                    'attribute' => 'id_mst_tingkat_pendidikan',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->tingkatPendidikan)) {
                            return $data->tingkatPendidikan->tingkat_pendidikan;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori1', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
                //'id_mst_tingkat_pendidikan',
                [
                    'attribute' => 'id_sekolah',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->dataSekolah)) {
                            return $data->dataSekolah->nama_sekolah;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori1', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
                'dari',
                'sampai',
                [
                    'attribute' => 'id_jurusan',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->dataJurusan)) {
                            return $data->dataJurusan->nama_jurusan_id;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori1', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
                //'grade',
                //'foto_ijazah',
                //'foto_transkrip',
                //'created_date',
                //'created_user',
                //'created_ip_address',
                //'modified_date',
                //'modified_user',
                //'modified_ip_address',
                [
                    'label' => 'Ijazah',
                    'format' => 'raw',

                    'value' => function ($data) use ($basepath) {
                        $imgpath = $data->foto_ijazah;
                        if ($data->foto_ijazah != "") {
                            return '<img class="img-responsive" width="100px" src="' . $basepath . '/uploads/foto-ijazah/' . $imgpath . '" alt="Foto Ijazah"/>';
                        } else {
                            return "No Image";
                        }
                    }
                ],
                [
                    'label' => 'Transkrip',
                    'format' => 'raw',

                    'value' => function ($data) use ($basepath) {
                        $imgpath = $data->foto_transkrip;
                        if ($data->foto_transkrip != "") {
                            return '<img class="img-responsive" width="100px" src="' . $basepath . '/uploads/foto-transkrip/' . $imgpath . '" alt="Foto Transkrip Nilai"/>';
                        } else {
                            return "No Image";
                        }
                    }
                ],
                /*
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{upload-image}',
                    'header' => 'Ijazah',// the default buttons + your custom button
                    'contentOptions' => ['style' => 'width: 180px;'],
                    'buttons' => [
                        'upload-image' => function($url, $model, $key) {
                            if($model->foto_ijazah != ""){
                                $res = '<img src="' . '../..' . '/backend/web/uploads/foto-ijazah/' . $model->foto_ijazah . '" class="img-responsive">';
                            }else{
                                $res = '<small class="label bg-blue">No Have Image</small><Br>';
                            }

                            return $res;
                        }
                    ]
                ],
                */
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
