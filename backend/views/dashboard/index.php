<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialInSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use backend\models\AppSettingSearch;
$appName = AppSettingSearch::getValueByKey("APP-NAME-SINGKAT");
$imgdefault = '@web/images/home.jpg';
$backimage = AppSettingSearch::getImageUrl("MAIN-BACKGROUND", $imgdefault);

$this->title = 'Home';
$this->title = $appName;
$this->params['breadcrumbs'][] = $this->title;


$total_perhomonan_baru = \backend\models\FormPermohonanInformasi::find()
    ->where(['status' => 'BELUM'])
    ->count();


$total_pengajuan_keberatan_baru = \backend\models\FormPengajuanKeberatan::find()
    ->where(['status' => 'BELUM'])
    ->count();
?>
<div class="box">
    <div class="box-body dash-in-index">
        <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?= $total_perhomonan_baru ?></h3>

                  <p>Permohonan Informasi Baru</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <?php
                $url_menu1 = \yii\helpers\Url::toRoute(['form-permohonan-informasi/index']);
                ?>
                <a href="<?= $url_menu1 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a> 
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?= $total_pengajuan_keberatan_baru ?><sup style="font-size: 20px"></sup></h3>

                  <p>Pengajuan Keberatan Baru</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <?php
                $url_menu2 = \yii\helpers\Url::toRoute(['form-pengajuan-keberatan/index']);
                ?>
                <a href="<?= $url_menu2 ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <?php /*
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?= $total_pengajuan_keberatan_baru ?></h3>

                  <p>Total Buang</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
            </div>
            */ ?>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="box-body">
                <img class="img-responsive" style="width:100%" src="<?php echo Yii::$app->request->baseUrl . $backimage; ?>"/>
            </div>
            <div class="box-body">
                <?php
                /*
                <?= $this->render('_grafik_laporan_bulanan', [
                    'dataProvider' => $dataProvider,
                ]) ?>
                */ ?>
            </div>
        </div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?php 
        /*
        echo GridView::widget([
        'dataProvider' => $dataProvider,
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
            //'mater.nama',
            [
                'attribute' => 'tanggal_proses',
                'label' => 'Tanggal Produksi',
            ],
            'jml_transaksi',
            'total_yard_awal',
            'total_yard_hasil',
            'total_buang',
            [
                'label' => 'Detail',
                'format' => 'raw',
                'value' => function ($data) {
                    //$ic = EncryptionDB::staticEncryptor('encrypt', $data->id_pelanggaran);
                    return Html::a(
                        '<i class="fa fa-fw fa-eye"></i>Detail',
                        ['material-in/laporan-bulanan-detail', 'tanggal_proses' => $data["tanggal_proses"]],
                        ['class' => 'btn btn-success btn-sm']
                    );
                }
            ],
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    */

    ?>

</div>