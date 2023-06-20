<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HrmCvAsuransiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asuransi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body hrm-cv-asuransi-index">

        
        <p>
            <?= Html::a('Tambah Asuransi', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'code_id',
            // 'ditanggung_perusahaan',
            [
                'attribute' => 'ditanggung_perusahaan',
                'format' => 'raw',
                'value' => function ($data) {
                    if (isset($data->ditanggung_perusahaan) == 1) {
                        return "YA";
                    } else {
                        return "TIDAK";
                    }
                },
                //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori1', $dataListMaterialKategori1, ['class' => 'form-control']),
            ],
            'tanggal_mulai_asuransi',
            'tanggal_jatuh_tempo',
            'durasi_asuransi',
            //'keterangan',
            //'created_date',
            //'created_user',
            //'created_ip_address',
            //'modified_date',
            //'modified_user',
            //'modified_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
