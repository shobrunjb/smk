<?php
use yii\helpers\Url;
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialSalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Material Sales';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body material-sales-index">


        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <?php //\yii\widgets\Pjax::begin(); ?>
        <?php Pjax::begin(['id' => 'pjax_id_1', 'options'=> ['class'=>'pjax', 'loaderId'=>'loader_id_1', 'neverTimeout'=>true]]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-edit"></span> ' . $this->title],
            'export' => [
                'label' => 'Export',
            ],

            'exportConfig' => [
                GridView::EXCEL => [
                    'label' => 'Save as EXCEL',
                    'iconOptions' => ['class' => 'text-success'],
                    'showHeader' => true,
                    'showPageSummary' => true,
                    'showFooter' => true,
                    'showCaption' => true,
                    'filename' => 'Data ' . $this->title,
                    'alertMsg' => 'Export Data to Excel.',
                    'mime' => 'application/vnd.ms-excel',
                    'config' => [
                        'worksheet' => 'ExportWorksheet',
                        'cssFile' => ''
                    ],

                ],
                GridView::CSV => [
                    'label' => 'Save as CSV',
                    'iconOptions' => ['class' => 'text-primary'],
                    'showHeader' => true,
                    'showPageSummary' => true,
                    'showFooter' => true,
                    'showCaption' => true,
                    'filename' => 'Data CSV ' . $this->title,
                    'alertMsg' => 'Export Data to CSV.',
                    'options' => ['title' => 'Comma Separated Values'],
                    'mime' => 'application/csv',
                    'config' => [
                        'colDelimiter' => ",",
                        'rowDelimiter' => "\r\n",
                    ],
                ],
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                /*
                'sales_harga_jual',
                'sales_created_date',
                'sales_created_ip_address',
                'yard',
                'kode',
                */
                [
                    'attribute' => 'id_material',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->mater)) {
                            return $data->mater->nama;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                ],
                [
                    'attribute' => 'id_material_kategori1',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->materialKategori1)) {
                            return $data->materialKategori1->nama;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori1', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
                [
                    'attribute' => 'id_material_kategori2',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->materialKategori2)) {
                            return $data->materialKategori2->nama;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori2', $dataListMaterialKategori2, ['class' => 'form-control']),
                ],
                [
                    'attribute' => 'id_material_kategori3',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->materialKategori3)) {
                            return $data->materialKategori3->nama;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori3', $dataListMaterialKategori3, ['class' => 'form-control']),
                ],
                //'yard',
                [
                    
                    'attribute' => 'yard',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if ($data->is_join_packing){
                            return $data->yard. '<br>
                            <span class="label label-warning">['.$data->join_info."]</span>";
                        }else{
                            return $data->yard;
                        }
                    },

                ],
                
                'year',
                //'no_urut',
                'kode',
                'barcode_kode',
                /*
                [
                    'attribute' => 'id_gudang',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->gudang)) {
                            return $data->gudang->nama_gudang;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_gudang', $dataListGudang, ['class' => 'form-control']),
                ],
                */
                //'no_urut_kode',
                //'barcode_kode',
                //'deskripsi',
                //'is_packing',
                //'created_date',
                //'created_ip_address',
                /*
                [
                    'class' => 'yii\grid\ActionColumn',
                    
                ],
                */
                /*
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete} {link}',
                    'buttons' => [
                        'update' => function ($url,$model) {
                            
                            return Html::a(
                                '<span class="glyphicon glyphicon-user"></span>', 
                                $url);
                        },
                        'link' => function ($url,$model,$key) {
                            return Html::a('Action', $url);
                        },
                    ],
                ],
                */
                /*
                [
                    'attribute' => 'id_material_in_item_proc',
                    'header' => 'Sumber Data',
                    'format' => 'raw',
                    'value' => function ($model) {
                        if ($model->id_material_in_item_proc == 0){
                            return '<span class="label label-warning">Ditambahkan Manual</span>';
                        } else {
                            return '<span class="label label-success">Generate dr Produksi</span>';
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_in_item_proc', $dataListSumberData, ['class' => 'form-control']),
                ],
                */
                //'year',
                //'no_urut',
                //'no_urut_kode',
                //'no_splitting',
                //'barcode_kode',
                //'deskripsi',
                //'is_packing',
                //'is_join_packing',
                //'join_info',
                //'created_date',
                //'created_ip_address',

                //['class' => 'yii\grid\ActionColumn'],
                /*
                [
                    'label' => 'Retur',
                    'format' => 'raw',

                    'value' => function ($data) use ($i, $ir) {
                        //$ic = EncryptionDB::staticEncryptor('encrypt', $data->id_pelanggaran);
                        $im = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_material_sales);
                        //$ip = \common\utils\EncryptionDB::encryptor('encrypt',$ip);
                        return Html::a(
                            '<i class="fa fa-fw fa-backward"></i> Retur',
                            ['sales-retur-cancel/retur-item', 'im' => $im, 'i' => $i, 'ir' => $ir],
                            [
                                'class' => 'btn btn-warning btn-xs',
                                'data' => [
                                    'confirm' => 'Anda yakin mau retur barang ini ['.$data->kode.']?',
                                    //'method' => 'post',
                                ],
                            ]
                        );
                    }
                ],
                */
            ],
        ]); ?>

        <?php \yii\widgets\Pjax::end(); ?>
    </div>
</div>
