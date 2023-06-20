<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HrmPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Korelasi Data Hasil Psikotest vs Kompetensi';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php

	
	
	//Column
	$listColumn = [
                ['class' => 'yii\grid\SerialColumn'],

//                'id_pegawai',
//                'id_perusahaan',
//                'userid',
//                'cid',
//                'no_dossier',
                 'NIP',
                 'nama_lengkap',
				[
					'label' => 'Batch',
					'value' =>  function ($model, $key, $index){
						return app\models\CcatAssesmentPesertaSearch::getAsesmentByPeserta($model->id_pegawai);
					}
				],
				[
					'label' => 'Nilai',
					'value' =>  function ($model, $key, $index){
						return app\models\CcatGenericPsyResultSearch::getValue($model->id_pegawai,255,0, 255001);
					}
				],
                // 'foto',
                // 'tempat_lahir',
                // 'tanggal_lahir',
                // 'usia',
                // 'usia_lebih_bulan',
                // 'jenis_kelamin',
                // 'golongan_darah',
                // 'tinggi_badan',
                // 'berat_badan',
                // 'agama',
                // 'status_pernikahan',
                // 'no_identitas_pribadi',
                // 'NPWP',
                // 'no_kartu_kesehatan',
                // 'no_kartu_tenagakerja',
                // 'kartu_kesehatan',
                // 'no_kartu_keluarga',
                // 'scan_ktp',
                // 'scan_bpjs',
                // 'scan_npwp',
                // 'scan_paraf',
                // 'scan_kk',
                // 'scan_tandatangan',
                // 'id_hrm_status_pegawai',
                // 'id_hrm_status_organik',
                // 'status_tenaga_kerja',
                // 'reg_tanggal_masuk',
                // 'reg_tanggal_diangkat',
                // 'reg_tanggal_training',
                // 'reg_status_pegawai',
                // 'tanggal_mpp',
                // 'tanggal_pensiun',
                // 'tanggal_terminasi',
                // 'id_hrm_mst_jenis_terminasi_bi',
                // 'gelar_akademik',
                // 'gelar_profesi',
                // 'pdk_id_tingkatpendidikan',
                // 'pdk_sekolah_terakhir',
                // 'pdk_jurusan_terakhir',
                // 'pdk_ipk_terakhir',
                // 'pdk_tahun_lulus',
                // 'alamat_termutakhir:ntext',
                // 'alamat_sesuai_identitas:ntext',
                // 'mobilephone1',
                // 'mobilephone2',
                // 'telepon_rumah',
                // 'fax_rumah',
                // 'email1:email',
                // 'email2:email',
                // 'jbt_id_jabatan',
                // 'jbt_jabatan',
                // 'jbt_id_tingkat_jabatan',
                // 'jbt_no_sk_jabatan',
                // 'jbt_tgl_keputusan',
                // 'jbt_tanggal_berlaku',
                // 'jbt_keterangan_mutasi',
                // 'pkt_id_pangkat',
                // 'pkt_no_sk',
                // 'pkt_tgl_keputusan',
                // 'pkt_tgl_berlaku',
                // 'pkt_gaji_pokok',
                // 'pkt_id_jenis_kenaikan_pangkat',
                // 'pkt_eselon',
                // 'pkt_ruang',
                // 'pos_id_hrm_kantor',
                // 'pos_id_hrm_unit_kerja',
                // 'pos_kantor',
                // 'sta_total_hukuman_disiplin',
                // 'sta_total_penghargaan',
                // 'pst_masabakti_20',
                // 'pst_masabakti_25',
                // 'pst_masabakti_30',
                // 'pst_masabakti_35',
                // 'pst_masabakti_40',
                // 'cuti_besar_terakhir_start',
                // 'cuti_besar_terakhir_end',
                // 'cuti_besar_terakhir_ke',
                // 'cuti_besar_plan_1',
                // 'cuti_besar_plan_2',
                // 'cuti_besar_plan_3',
                // 'cuti_besar_plan_4',
                // 'cuti_besar_plan_5',
                // 'cuti_besar_plan_6',
                // 'cuti_besar_plan_7',
                // 'cuti_besar_ambil_1',
                // 'cuti_besar_ambil_2',
                // 'cuti_besar_ambil_3',
                // 'cuti_besar_ambil_4',
                // 'cuti_besar_ambil_5',
                // 'cuti_besar_ambil_6',
                // 'cuti_besar_ambil_7',
                // 'cuti_besar_aktual_1',
                // 'cuti_besar_aktual_2',
                // 'cuti_besar_aktual_3',
                // 'cuti_besar_aktual_4',
                // 'cuti_besar_aktual_5',
                // 'cuti_besar_aktual_6',
                // 'cuti_besar_aktual_7',
                // 'cuti_besar_aktual_end_1',
                // 'cuti_besar_aktual_end_2',
                // 'cuti_besar_aktual_end_3',
                // 'cuti_besar_aktual_end_4',
                // 'cuti_besar_aktual_end_5',
                // 'cuti_besar_aktual_end_6',
                // 'cuti_besar_aktual_end_7',
                // 'created_date',
                // 'created_user',
                // 'created_ip_address',
                // 'modified_date',
                // 'modified_user',
                // 'modified_ip_address',

                //['class' => 'yii\grid\ActionColumn'],
            ];
			
			
	//Ambil beberapa nilai ujian
	$datas= app\models\CcatJenisUjian::find()
				->all();
	foreach($datas as $data){
		$datasubujians = app\models\CcatJenisSubUjian::find()
				->where(['id_ccat_jenis_ujian' => $data->id_ccat_jenis_ujian])
				->all();
		foreach($datasubujians as $sub){
			$listColumn[] =  
			[
				'label' => $data->jenis_ujian,
				'value' =>  function ($model, $key, $index) use ($data, $sub) {
					//return "[0]";
					return $data->id_ccat_jenis_ujian." ".$sub->id_ccat_jenis_sub_ujian;
					return app\models\CcatGenericPsyResultSearch::getValue($model->id_pegawai,
						$data->id_ccat_jenis_ujian,$sub->id_ccat_jenis_sub_ujian, 0);
				}
			];
		}
	}
?>
<div class="hrm-pegawai-index box box-primary">
	<div class="box-body">
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => $listColumn,
        ]); ?>
    </div>
	</div>
</div>
