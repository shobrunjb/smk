<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

use app\models\Kabupaten;
// use app\models\HrmKantor;
//use app\models\HrmKantorKategori;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HrmPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Environment Attribute';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kabupaten-index box box-primary">
    <div class="box-header with-border">
        <?php //= Html::a('Tambah Pegawai', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
        <?php
        echo $this->render('_search_custom', ['model' => $searchModel]); ?>
    </div>
    <div class="box-body">


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-cube"></span> Kabupaten'],
            'export' => [
                'label' => 'Export',
            ],
            'pager' => [
                'firstPageLabel' => 'First',
                'lastPageLabel'  => 'Last'
            ],
            'exportConfig' => [
                GridView::EXCEL => [
                    'label' => 'Save as EXCEL',
                    'iconOptions' => ['class' => 'text-success'],
                    'showHeader' => true,
                    'showPageSummary' => true,
                    'showFooter' => true,
                    'showCaption' => true,
                    'filename' => 'Batch Asesmen',
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
                    'filename' => 'Batch Asesmen',
                    'alertMsg' => 'Export Data to CSV.',
                    'options' => ['title' => 'Comma Separated Values'],
                    'mime' => 'application/csv',
                    'config' => [
                        'colDelimiter' => ",",
                        'rowDelimiter' => "\r\n",
                    ],
                ],
            ],
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nama_kabupaten',
                //'alamat_kontak',
                //'telepon_kontak',

                //['class' => 'yii\grid\ActionColumn'],
                [
                    'label' => 'Ubah Atribut',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) { 
                        //$i = $data->id_jabatan;
                        $i = \common\utils\EncryptionDB::encryptor('encrypt', $data->id_kabupaten);

                        return Html::a(
                            '<i class="fa fa-fw fa-edit"></i> Ubah Atribut',
                            ['environment-attribute/change', 'i' => $i],
                            ['class' => 'btn btn-success btn-xs']
                        );
                    }
                ],
                [
                    'label' => 'View Atribut',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        //$i = $data->id_jabatan;
                        $i = \common\utils\EncryptionDB::encryptor('encrypt', $data->id_kabupaten);

                        return Html::a(
                            '<i class="fa fa-fw fa-eye"></i> View Atribut',
                            ['environment-attribute/view', 'i' => $i],
                            ['class' => 'btn btn-warning btn-xs']
                        );
                    }
                ],
            ],
        ]); ?>
    </div>
</div>