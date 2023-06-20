<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

?>

            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //     'type',
                'tahun',
                //'no',
                'sasaran',
                 'jenis_penilaian'=>'id_smk_jenis_penilaian',
                // [
                //     'attribute' => 'id_smk_jenis_penilaian',
                //     'format' => 'raw',
                //     'value' => function ($data) {
                //         $listStatus = \yii\helpers\ArrayHelper::map(
                //             \backend\models\SmkJenisPenilaian::find()->orderBy([
                //                 'id_smk_jenis_penilaian' => SORT_ASC
                //             ])->asArray()->all(),
                //             'id_smk_jenis_penilaian',
                //             'jenis_penilaian'
                //             );

                //         return $listStatus;
                //     }

                    
                // ],
               
                
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
        ]); 
        ?>

        <p>
            <?= Html::a('Tambah Indikator', ['create','t' =>$t,'year'=>$year,'periode'=>$periode], ['class' => 'btn btn-primary']) ?>
        </p>