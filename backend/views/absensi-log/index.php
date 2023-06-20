<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AbsensiLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Absensi Log';
$this->params['breadcrumbs'][] = $this->title;

$listPegawai = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\HrmPegawai::find()
        ->orderBy([
            'nama_lengkap' => SORT_ASC
            ])
        ->all(), 'id_pegawai', 'nama_lengkap');
?>
<div class="box">
    <div class="box-body absensi-log-index">

        
        <p>
            <?= Html::a('Tambah Absensi Log', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'id_pegawai',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->pegawai)) {
                            return $data->pegawai->nama_lengkap;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'id_pegawai', $listPegawai, ['class' => 'form-control']),
                ],
                'tanggal_absensi',
                'waktu_absensi',
                'latitude',
                'longitude',
                'foto_bukti',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
