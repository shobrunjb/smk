<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SmkPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penilaian Kinerja Pegawai X';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body penilaian-kinerja-pegawai-index">
    <i class="fa fa-info-circle" aria-hidden="true"></i> Tata Cara Pengisian Penilaian Awal Tahun
         
         <hr>
         1. Silakan klik tombol ‘Tambah Baru’ pad bagian bawah tabel. <br>
         2.  Isi data sesuai dengan kolom tabel <br>
         3. Jika data sudah diisi, maka klik tombol ‘Save’ pada bagian bawah tabel. <br>
         4. Data penilaian awal tahun berhasil disimpan, jika ada kendala terhadap pengisian silakan menghubungi Administrator.<br>
  
         <hr> <br>

        
        <p>
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            <?php //= Html::a('Tambah Smk Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'type',
            'tahun',
            //'sasaran',
            //'plan_sasaran',
            //'real_sasaran',
            //'no',
            //'rev',
            //'rev_pre_sasaran',
            //'target',
            //'ukuran_pencapaian',
            //'sub_bobot',
            //'plan_target',
            //'plan_ukuran_pencapaian',
            //'plan_sub_bobot',
            //'real_target',
            //'real_ukuran_pencapaian',
            //'real_sub_bobot',
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
            //'real_a_rentang_1_i',
            //'real_a_rentang_1_ii',
            //'real_a_rentang_2_i',
            //'real_a_rentang_2_ii',
            //'real_b_rentang_1_i',
            //'real_b_rentang_1_ii',
            //'real_b_rentang_2_i',
            //'real_b_rentang_2_ii',
            //'real_c_rentang_1_i',
            //'real_c_rentang_1_ii',
            //'real_c_rentang_2_i',
            //'real_c_rentang_2_ii',
            //'real_d_rentang_1_i',
            //'real_d_rentang_1_ii',
            //'real_d_rentang_2_i',
            //'real_d_rentang_2_ii',
            //'real_e_rentang_1_i',
            //'real_e_rentang_1_ii',
            //'real_e_rentang_2_i',
            //'real_e_rentang_2_ii',
            //'real_f_rentang_1_i',
            //'real_f_rentang_1_ii',
            //'real_f_rentang_2_i',
            //'real_f_rentang_2_ii',
            //'bc_sub_bobot',
            //'bmb_capaian',
            //'bmb_nilai_sementara',
            //'bmb_total_poin_sementara',
            'bmb_catatan',
            //'final_capaian',
            //'final_nilai_sementara',
            //'final_total_poin_sementara',
            //'final_catatan',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
