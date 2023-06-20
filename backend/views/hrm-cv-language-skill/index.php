<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HrmCvLanguageSkillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Keahlian Bahasa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body hrm-cv-language-skill-index">

        
        <p>
            <?= Html::a('Tambah Keahlian Bahasa', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'code_id',
                [
                    'attribute' => 'id_mst_bahasa',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->HrmMstBahasa)) {
                            return $data->HrmMstBahasa->bahasa;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori1', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
            // 'bahasa',
            'tingkat_keahlian',
            'punya_sertifikat',
            'sertifikat',
            //'foto_sertifikat',
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
