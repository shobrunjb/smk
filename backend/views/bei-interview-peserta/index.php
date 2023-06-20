<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\BeiInterviewBacth;
use backend\models\HrmPegawai;
use backend\common\labeling\CommonActionLabelEnum;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiInterviewPesertaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Interview Peserta';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-interview-peserta-index box box-primary">

       <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header with-border">
        <?php // Html::a('Create Interview Peserta', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>

<div class="box-body table-responsive no-padding">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_bei_interview_peserta',
            [
                'attribute' => 'interviwBacth.nama_batch',
                'label'=>'Batch Interview',
                 'filter' => Html::activeDropDownList($searchModel, 'id_bei_interview_batch', ArrayHelper::map(BeiInterviewBacth::find()->orderBy('id_bei_interview_batch')->all(),'id_bei_interview_batch','nama_batch'),['class'=>'form-control','prompt'=>'-Pilih-']),
            ],
            //'id_bei_interview_batch',
            //'id_pegawai',
            [
                'label' => 'Nama Pegawai',
                'attribute' => 'id_pegawai',
                'value' => 'pegawai.nama_lengkap',
            ],
            'created_date',
            'created_user',
            //'created_ip_address',
            //'modified_date',
            //'modified_user',
            //'modified_ip_address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>