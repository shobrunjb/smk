<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiKarAssesJawabanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kar Asses Jawaban';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-kar-asses-jawaban-index box box-primary">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
        echo  Html::a('Display Dictionary', ['display-word-bag'], ['class' => 'btn btn-sm btn-warning']);
    ?>
    <?php
        echo  Html::a('Display Keyword', ['display-word-key'], ['class' => 'btn btn-sm btn-success']);
    ?>
    <?php
        echo  Html::a('Display Finish Result', ['display-finish-result'], ['class' => 'btn btn-sm btn-danger']);
    ?>
    <div class="box-body table-responsive no-padding">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nama_lengkap',
                'NIP',
                'jenis_kelamin',
                'jbt_jabatan',
                'pos_kantor',

                [
                    'label'=>'Hasil Asesmen',
                    'format' => 'raw',

                    'value' => function($data) {
                         return Html::a('Lihat Hasil', [ 'bei-kar-asses-jawaban/pegawai-list-session','id_pegawai'=>$data->id_pegawai ], ['class' => 'btn btn-info']);
                        $status= " ";
                        if(!$status){
                             return Html::a('Lihat Hasil', [ 'bei-kar-asses-jawaban/pegawaiResultShort','id_pegawai'=>$data->id_pegawai ], ['class' => 'btn btn-info']);
                        }else{
                            return '<div class="alert alert-error" style="padding:5px; margin:3px;">BELUM ADA</div>';
                        }
                    }
                ],

               // ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>