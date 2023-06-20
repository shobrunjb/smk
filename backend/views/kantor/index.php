<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KantorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kantor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body kantor-index">

        
        <p>
            <?= Html::a('Tambah Kantor', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nama_kantor',
                'alamat',
                [
                    'attribute' => 'id_kabupaten',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        if (isset($data->kabupaten)) {
                            return $data->kabupaten->nama_kabupaten;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_kabupaten', $dataListEnvironment, ['class' => 'form-control', 'prompt' => '-Pilih Environment-']),
                ],
                [
                    'attribute' => 'id_perusahaan',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        if (isset($data->perusahaan)) {
                            return $data->perusahaan->perusahaan;
                        } else {
                            return "--";
                        }
                    },
                    // 'filter'=>Html::activeDropDownList($searchModel, 'id_perusahaan', $dataListEnvironment, ['class' => 'form-control', 'prompt' => '-Pilih Perusahaan-']),
                ],
                'longitude',
                'latitude',
                //'keterangan',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
