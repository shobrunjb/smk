<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

use app\models\HrmPegawai;
use app\models\HrmKantor;
//use app\models\HrmKantorKategori;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HrmPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Matching Personal vs Organization';
$this->params['breadcrumbs'][] = $this->title;

$dataListOrganization = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\Perusahaan::find()
         ->orderBy([
            'perusahaan' => SORT_ASC
            ])
        ->all(), 'id_perusahaan', 'perusahaan');
?>
<div class="hrm-pegawai-index box box-primary">
    <div class="box-header with-border">
        <?php //= Html::a('Tambah Pegawai', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
        <?php
        echo $this->render('_search_custom', ['model' => $searchModel]); ?>
    </div>
    <div class="box-body">


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-cube"></span> Pegawai'],
            'export' => [
                'label' => 'Export',
            ],
            'pager' => [
                'firstPageLabel' => 'First',
                'lastPageLabel'  => 'Last'
            ],
            'exportConfig' => [
                GridView::EXCEL => [
                    'label' => 'Save as EXCEL',
                    'iconOptions' => ['class' => 'text-success'],
                    'showHeader' => true,
                    'showPageSummary' => true,
                    'showFooter' => true,
                    'showCaption' => true,
                    'filename' => 'Batch Asesmen',
                    'alertMsg' => 'Export Data to Excel.',
                    'mime' => 'application/vnd.ms-excel',
                    'config' => [
                        'worksheet' => 'ExportWorksheet',
                        'cssFile' => ''
                    ],

                ],
                GridView::CSV => [
                    'label' => 'Save as CSV',
                    'iconOptions' => ['class' => 'text-primary'],
                    'showHeader' => true,
                    'showPageSummary' => true,
                    'showFooter' => true,
                    'showCaption' => true,
                    'filename' => 'Batch Asesmen',
                    'alertMsg' => 'Export Data to CSV.',
                    'options' => ['title' => 'Comma Separated Values'],
                    'mime' => 'application/csv',
                    'config' => [
                        'colDelimiter' => ",",
                        'rowDelimiter' => "\r\n",
                    ],
                ],
            ],
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //                'id_pegawai',
                //                'id_perusahaan',
                //                'userid',
                //                'cid',
                //                'no_dossier',
                //                 'NIP',
                // [
                //     'attribute' => 'NIP',
                //     'filter' => false,
                // ],
                // [
                //     'attribute' => 'id_pegawai',
                //     'filter' => false,
                // ],
                [
                    'attribute' => 'nama_lengkap',
                    'filter' => false,
                ],
                'status.status_pegawai',
                'tingkatPendidikan.tingkat_pendidikan',

                // 'nama_lengkap',
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
                //'alamat_sesuai_identitas:ntext',
                // [
                //     'attribute' => 'alamat_sesuai_identitas',
                //     'filter' => false,
                // ],
                /*
                [
                    'attribute' => 'mobilephone1',
                    'filter' => false,
                ],
                */
                //'mobilephone1',
                // 'mobilephone2',
                // 'telepon_rumah',
                // 'fax_rumah',
                /*
                [
                    'attribute' => 'email1',
                    'filter' => false,
                ],
                */
                // [
                //     'attribute' => 'jbt_jabatan',
                //     'filter' => false,
                // ],
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


                /* [
                    'label'=>'Kantor Kategori',
                    'attribute' => 'kategori_kantor',
                    'value' => 'kantorKategori.kategori',
                   // 'filter' => Html::activeDropDownList($searchModel, 'kategori_kantor', ArrayHelper::map(HrmKantorKategori::find()->orderBy('id_hrm_kantor_kategori')->all(),'kategori','kategori'),['class'=>'form-control','prompt'=>'-Pilih-']),
                 ], */

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
                [
                    'label' => 'Organization',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        if (isset($data->perusahaan)) {
                            return $data->perusahaan->perusahaan;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'id_perusahaan', $dataListOrganization, ['class' => 'form-control', 'prompt' => '-Pilih Organization-']),
                ],

                [
                    'label' => 'Matching',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        //$i = $data->id_pegawai;
                        $i = \common\utils\EncryptionDB::encryptor('encrypt', $data->id_pegawai);

                        return Html::a(
                            '<i class="fa fa-fw fa-check-square"></i> Match',
                            ['matching-personal-organization/view', 'i' => $i],
                            ['class' => 'btn btn-warning btn-xs']
                        );
                    }
                ],
                [
                    'label' => 'Fit Value',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $result = \backend\models\MatchingOrganizationResult::find()
                            ->where([
                                'id_perusahaan' => $data->id_perusahaan,
                                'id_pegawai' =>$data->id_pegawai,
                            ])
                            ->one();
                        if($result != null){
                            return $result->fit_value;
                        }else{
                            return "--";
                        }
                    }
                ],
                [
                    'label' => 'Ack Kecocokan Organization',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $result = \backend\models\MatchingOrganizationResult::find()
                            ->where([
                                'id_perusahaan' => $data->id_perusahaan,
                                'id_pegawai' =>$data->id_pegawai,
                            ])
                            ->one();
                        if($result != null){
                            return $result->acknowledge_individul_fit_label;
                        }else{
                            return "--";
                        }
                    },
                    'filter'=>false
                ],
                [
                    'label' => 'Check',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $result = \backend\models\MatchingOrganizationResult::find()
                            ->where([
                                'id_perusahaan' => $data->id_perusahaan,
                                'id_pegawai' =>$data->id_pegawai,
                            ])
                            ->one();
                        if($result != null){
                            return $result->check;
                        }else{
                            return "--";
                        }
                    },
                    'filter'=>false
                ],
            ],
        ]); ?>
    </div>
</div>