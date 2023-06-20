<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HrmPegawai */

?>
<div class="perusahaan-view box box-primary">
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                /*'id_pegawai',
                'id_perusahaan',
                'userid',
                'cid',
                'no_dossier', */
                'perusahaan',
                'deskripsi',
                'alamat_kontak',
                'telepon_kontak',
                // 'NIP',
                // 'nama_lengkap',
                // 'jenis_kelamin',
                //'tanggal_lahir',
                /*'foto',
                'tempat_lahir',
                'usia',
                'usia_lebih_bulan',
                'golongan_darah',
                'tinggi_badan',
                'berat_badan',
                'agama',
                'status_pernikahan',
                'no_identitas_pribadi',
                'NPWP',
                'no_kartu_kesehatan',
                'no_kartu_tenagakerja',
                'kartu_kesehatan',
                'no_kartu_keluarga',
                'scan_ktp',
                'scan_bpjs',
                'scan_npwp',
                'scan_paraf',
                'scan_kk',
                'scan_tandatangan',
                'id_hrm_status_pegawai',
                'id_hrm_status_organik',
                'status_tenaga_kerja',
                'reg_tanggal_masuk',
                'reg_tanggal_diangkat',
                'reg_tanggal_training',
                'reg_status_pegawai',
                'tanggal_mpp',
                'tanggal_pensiun',
                'tanggal_terminasi',
                'id_hrm_mst_jenis_terminasi_bi',
                'gelar_akademik',
                'gelar_profesi',
                'pdk_id_tingkatpendidikan',
                'pdk_sekolah_terakhir',
                'pdk_jurusan_terakhir',
                'pdk_ipk_terakhir',
                'pdk_tahun_lulus',
                'alamat_termutakhir:ntext', */
                //'alamat_sesuai_identitas:ntext',
                //'mobilephone1',
               // 'mobilephone2',
               // 'telepon_rumah',
              //  'fax_rumah',
                //'email1:email',
                //'status.status_pegawai',
                //'tingkatPendidikan.tingkat_pendidikan',
                //'no_bpjs',
               // 'email2:email',
               // 'jbt_id_jabatan',
               // 'jbt_jabatan',
              /*  'jbt_id_tingkat_jabatan',
                'jbt_no_sk_jabatan',
                'jbt_tgl_keputusan',
                'jbt_tanggal_berlaku',
                'jbt_keterangan_mutasi',
                'pkt_id_pangkat',
                'pkt_no_sk',
                'pkt_tgl_keputusan',
                'pkt_tgl_berlaku',
//               'modified_ip_address', */
            ],
        ]) ?>
    </div>
</div>
