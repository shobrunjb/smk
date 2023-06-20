<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JenisLaporanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Laporan';
$this->params['breadcrumbs'][] = $this->title;
$basepath = Yii::$app->request->baseUrl;
?>
<div class="box">
    <div class="box-body jenis-Laporan-index">

        
        <p>
            <?= Html::a('Tambah Jenis Laporan', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'jenis_laporan',
                'deskripsi',
                [
                    'label' => 'Icon',
                    'format' => 'raw',
                    'value' => function ($data) use ($basepath) {
                        $imgpath = $data->icon;
                        if ($data->icon != "") {
                            //return '<img class="img-responsive" width="100px" src="' . $basepath . '/uploads/galery/' . $imgpath . '" alt="Foto"/>';
                            return '<img src="'.'../..'.'/frontend/web/file/jenislaporan/'.$imgpath.'" class="img-responsive" width="150px" alt="Foto"> ';
                        } else {
                            return "No Icon";
                        }
                    }
                ],
                //'is_active',
                [
                    'attribute' => 'is_active',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return $data->getStatusAktif();
                    }
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
