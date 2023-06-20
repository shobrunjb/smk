<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SmkAspekRencanaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rekap Penilaian Individu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body perencanaan-penilaian-index">
                <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [

                
            

                ['class' => 'yii\grid\SerialColumn'],

            //     'type',
            'tahun',
            'no',
            'sasaran',
            // 'plan_sasaran',
           
            //'rev',
            //'rev_pre_sasaran',
            'target',
            //'ukuran_pencapaian',
            'sub_bobot',
            //'plan_target',
            //'plan_ukuran_pencapaian',
            //'plan_sub_bobot',
            //'plan_a_rentang_1_i',
            //'plan_a_rentang_1_ii',
            //'plan_a_rentang_2_i',
            //'plan_a_rentang_2_ii',
            //'plan_b_rentang_1_i',
            //'plan_b_rentang_1_ii',
            //'plan_b_rentang_2_i',
            //'plan_b_rentang_2_ii',
            //'plan_c_rentang_1_i',
            //'plan_c_rentang_1_ii',
            //'plan_c_rentang_2_i',
            //'plan_c_rentang_2_ii',
            //'plan_d_rentang_1_i',
            //'plan_d_rentang_1_ii',
            //'plan_d_rentang_2_i',
            //'plan_d_rentang_2_ii',
            //'plan_e_rentang_1_i',
            //'plan_e_rentang_1_ii',
            //'plan_e_rentang_2_i',
            //'plan_e_rentang_2_ii',
            //'plan_f_rentang_1_i',
            //'plan_f_rentang_1_ii',
            //'plan_f_rentang_2_i',
            //'plan_f_rentang_2_ii',
            //'bc_sub_bobot',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

        <p>
            <?= Html::a('Tambah Indikator', ['create'], ['class' => 'btn btn-primary']) ?>
        </p>
    
    
    </div>
</div>
