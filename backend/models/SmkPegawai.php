<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "smk_pegawai".
 *
 * @property int $id_smk_pegawai
 * @property int $id_smk_pegawai_tahunan ID untuk mengetahui SMK ini menempel kepada pegawai yang mana
 * @property string $type Menyatakan type dari SMK. Tahunan atau Per Periode/ Triwulan
 * @property int $tahun
 * @property int|null $id_smk_periode Informasi tentang periode. Misal TRIWULAN I, II, III, IV, dst. Jika typenya TAHUNAN maka boleh dikosongkan
 * @property string|null $sasaran
 * @property string $plan_sasaran
 * @property string $real_sasaran
 * @property int|null $id_smk_sasaran_position
 * @property int $no
 * @property int|null $rev
 * @property string $rev_pre_sasaran
 * @property int $id_smk_mst_jenis_penilaian
 * @property int $id_aspek_penilaian
 * @property string $target
 * @property string $ukuran_pencapaian
 * @property float $sub_bobot
 * @property int $plan_id_smk_mst_jenis_penilaian
 * @property int $plan_id_aspek_penilaian
 * @property string $plan_target
 * @property string $plan_ukuran_pencapaian
 * @property float $plan_sub_bobot
 * @property int $real_id_smk_mst_jenis_penilaian
 * @property int $real_id_aspek_penilaian
 * @property string $real_target
 * @property string $real_ukuran_pencapaian
 * @property float $real_sub_bobot
 * @property string|null $plan_a_rentang_1_i
 * @property string|null $plan_a_rentang_1_ii
 * @property string|null $plan_a_rentang_2_i
 * @property string|null $plan_a_rentang_2_ii
 * @property string|null $plan_b_rentang_1_i
 * @property string|null $plan_b_rentang_1_ii
 * @property string|null $plan_b_rentang_2_i
 * @property string|null $plan_b_rentang_2_ii
 * @property string|null $plan_c_rentang_1_i
 * @property string|null $plan_c_rentang_1_ii
 * @property string|null $plan_c_rentang_2_i
 * @property string|null $plan_c_rentang_2_ii
 * @property string|null $plan_d_rentang_1_i
 * @property string|null $plan_d_rentang_1_ii
 * @property string|null $plan_d_rentang_2_i
 * @property string|null $plan_d_rentang_2_ii
 * @property string|null $plan_e_rentang_1_i
 * @property string|null $plan_e_rentang_1_ii
 * @property string|null $plan_e_rentang_2_i
 * @property string|null $plan_e_rentang_2_ii
 * @property string|null $plan_f_rentang_1_i
 * @property string|null $plan_f_rentang_1_ii
 * @property string|null $plan_f_rentang_2_i
 * @property string|null $plan_f_rentang_2_ii
 * @property string|null $real_a_rentang_1_i
 * @property string|null $real_a_rentang_1_ii
 * @property string|null $real_a_rentang_2_i
 * @property string|null $real_a_rentang_2_ii
 * @property string|null $real_b_rentang_1_i
 * @property string|null $real_b_rentang_1_ii
 * @property string|null $real_b_rentang_2_i
 * @property string|null $real_b_rentang_2_ii
 * @property string|null $real_c_rentang_1_i
 * @property string|null $real_c_rentang_1_ii
 * @property string|null $real_c_rentang_2_i
 * @property string|null $real_c_rentang_2_ii
 * @property string|null $real_d_rentang_1_i
 * @property string|null $real_d_rentang_1_ii
 * @property string|null $real_d_rentang_2_i
 * @property string|null $real_d_rentang_2_ii
 * @property string|null $real_e_rentang_1_i
 * @property string|null $real_e_rentang_1_ii
 * @property string|null $real_e_rentang_2_i
 * @property string|null $real_e_rentang_2_ii
 * @property string|null $real_f_rentang_1_i
 * @property string|null $real_f_rentang_1_ii
 * @property string|null $real_f_rentang_2_i
 * @property string|null $real_f_rentang_2_ii
 * @property float|null $bc_sub_bobot
 * @property string|null $bmb_capaian
 * @property string|null $bmb_nilai_sementara
 * @property float|null $bmb_total_poin_sementara
 * @property string|null $bmb_catatan
 * @property string|null $final_capaian
 * @property string|null $final_nilai_sementara
 * @property float|null $final_total_poin_sementara
 * @property string|null $final_catatan
 */
class SmkPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smk_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_smk_pegawai_tahunan', 'tahun', 'id_aspek_penilaian', 'target', 'ukuran_pencapaian'], 'required'],
            [['id_smk_pegawai_tahunan', 'tahun', 'id_smk_periode', 'id_smk_sasaran_position', 'no', 'rev', 'id_smk_mst_jenis_penilaian', 'id_aspek_penilaian', 'plan_id_smk_mst_jenis_penilaian', 'plan_id_aspek_penilaian', 'real_id_smk_mst_jenis_penilaian', 'real_id_aspek_penilaian'], 'integer'],
            [['type'], 'string'],
            [['sub_bobot', 'plan_sub_bobot', 'real_sub_bobot', 'bc_sub_bobot', 'bmb_total_poin_sementara', 'final_total_poin_sementara'], 'number'],
            [['sasaran'], 'string', 'max' => 1000],
            [['plan_sasaran', 'real_sasaran'], 'string', 'max' => 1200],
            [['rev_pre_sasaran', 'bmb_nilai_sementara', 'final_nilai_sementara'], 'string', 'max' => 100],
            [['target', 'ukuran_pencapaian', 'plan_target', 'plan_ukuran_pencapaian', 'real_target', 'real_ukuran_pencapaian', 'plan_a_rentang_1_i', 'plan_a_rentang_1_ii', 'plan_a_rentang_2_i', 'plan_a_rentang_2_ii', 'plan_b_rentang_1_i', 'plan_b_rentang_1_ii', 'plan_b_rentang_2_i', 'plan_b_rentang_2_ii', 'plan_c_rentang_1_i', 'plan_c_rentang_1_ii', 'plan_c_rentang_2_i', 'plan_c_rentang_2_ii', 'plan_d_rentang_1_i', 'plan_d_rentang_1_ii', 'plan_d_rentang_2_i', 'plan_d_rentang_2_ii', 'plan_e_rentang_1_i', 'plan_e_rentang_1_ii', 'plan_e_rentang_2_i', 'plan_e_rentang_2_ii', 'plan_f_rentang_1_i', 'plan_f_rentang_1_ii', 'plan_f_rentang_2_i', 'plan_f_rentang_2_ii', 'real_a_rentang_1_i', 'real_a_rentang_1_ii', 'real_a_rentang_2_i', 'real_a_rentang_2_ii', 'real_b_rentang_1_i', 'real_b_rentang_1_ii', 'real_b_rentang_2_i', 'real_b_rentang_2_ii', 'real_c_rentang_1_i', 'real_c_rentang_1_ii', 'real_c_rentang_2_i', 'real_c_rentang_2_ii', 'real_d_rentang_1_i', 'real_d_rentang_1_ii', 'real_d_rentang_2_i', 'real_d_rentang_2_ii', 'real_e_rentang_1_i', 'real_e_rentang_1_ii', 'real_e_rentang_2_i', 'real_e_rentang_2_ii', 'real_f_rentang_1_i', 'real_f_rentang_1_ii', 'real_f_rentang_2_i', 'real_f_rentang_2_ii', 'bmb_capaian', 'final_capaian'], 'string', 'max' => 150],
            [['bmb_catatan', 'final_catatan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_smk_pegawai' => 'Id Smk Pegawai',
            'id_smk_pegawai_tahunan' => 'Id Smk Pegawai Tahunan',
            'type' => 'Type',
            'tahun' => 'Tahun',
            'id_smk_periode' => 'Id Smk Periode',
            'sasaran' => 'Indikator',
            'plan_sasaran' => 'Plan Sasaran',
            'real_sasaran' => 'Real Sasaran',
            'id_smk_sasaran_position' => 'Id Smk Sasaran Position',
            'no' => 'No',
            'rev' => 'Rev',
            'rev_pre_sasaran' => 'Rev Pre Sasaran',
            'id_smk_mst_jenis_penilaian' => 'Id Smk Mst Jenis Penilaian',
            'id_aspek_penilaian' => 'Id Aspek Penilaian',
            'target' => 'Target',
            'ukuran_pencapaian' => 'Ukuran Pencapaian',
            'sub_bobot' => 'Sub Bobot',
            'plan_id_smk_mst_jenis_penilaian' => 'Plan Id Smk Mst Jenis Penilaian',
            'plan_id_aspek_penilaian' => 'Plan Id Aspek Penilaian',
            'plan_target' => 'Plan Target',
            'plan_ukuran_pencapaian' => 'Plan Ukuran Pencapaian',
            'plan_sub_bobot' => 'Plan Sub Bobot',
            'real_id_smk_mst_jenis_penilaian' => 'Real Id Smk Mst Jenis Penilaian',
            'real_id_aspek_penilaian' => 'Real Id Aspek Penilaian',
            'real_target' => 'Real Target',
            'real_ukuran_pencapaian' => 'Real Ukuran Pencapaian',
            'real_sub_bobot' => 'Real Sub Bobot',
            'plan_a_rentang_1_i' => 'Plan A Rentang 1 I',
            'plan_a_rentang_1_ii' => 'Plan A Rentang 1 Ii',
            'plan_a_rentang_2_i' => 'Plan A Rentang 2 I',
            'plan_a_rentang_2_ii' => 'Plan A Rentang 2 Ii',
            'plan_b_rentang_1_i' => 'Plan B Rentang 1 I',
            'plan_b_rentang_1_ii' => 'Plan B Rentang 1 Ii',
            'plan_b_rentang_2_i' => 'Plan B Rentang 2 I',
            'plan_b_rentang_2_ii' => 'Plan B Rentang 2 Ii',
            'plan_c_rentang_1_i' => 'Plan C Rentang 1 I',
            'plan_c_rentang_1_ii' => 'Plan C Rentang 1 Ii',
            'plan_c_rentang_2_i' => 'Plan C Rentang 2 I',
            'plan_c_rentang_2_ii' => 'Plan C Rentang 2 Ii',
            'plan_d_rentang_1_i' => 'Plan D Rentang 1 I',
            'plan_d_rentang_1_ii' => 'Plan D Rentang 1 Ii',
            'plan_d_rentang_2_i' => 'Plan D Rentang 2 I',
            'plan_d_rentang_2_ii' => 'Plan D Rentang 2 Ii',
            'plan_e_rentang_1_i' => 'Plan E Rentang 1 I',
            'plan_e_rentang_1_ii' => 'Plan E Rentang 1 Ii',
            'plan_e_rentang_2_i' => 'Plan E Rentang 2 I',
            'plan_e_rentang_2_ii' => 'Plan E Rentang 2 Ii',
            'plan_f_rentang_1_i' => 'Plan F Rentang 1 I',
            'plan_f_rentang_1_ii' => 'Plan F Rentang 1 Ii',
            'plan_f_rentang_2_i' => 'Plan F Rentang 2 I',
            'plan_f_rentang_2_ii' => 'Plan F Rentang 2 Ii',
            'real_a_rentang_1_i' => 'Real A Rentang 1 I',
            'real_a_rentang_1_ii' => 'Real A Rentang 1 Ii',
            'real_a_rentang_2_i' => 'Real A Rentang 2 I',
            'real_a_rentang_2_ii' => 'Real A Rentang 2 Ii',
            'real_b_rentang_1_i' => 'Real B Rentang 1 I',
            'real_b_rentang_1_ii' => 'Real B Rentang 1 Ii',
            'real_b_rentang_2_i' => 'Real B Rentang 2 I',
            'real_b_rentang_2_ii' => 'Real B Rentang 2 Ii',
            'real_c_rentang_1_i' => 'Real C Rentang 1 I',
            'real_c_rentang_1_ii' => 'Real C Rentang 1 Ii',
            'real_c_rentang_2_i' => 'Real C Rentang 2 I',
            'real_c_rentang_2_ii' => 'Real C Rentang 2 Ii',
            'real_d_rentang_1_i' => 'Real D Rentang 1 I',
            'real_d_rentang_1_ii' => 'Real D Rentang 1 Ii',
            'real_d_rentang_2_i' => 'Real D Rentang 2 I',
            'real_d_rentang_2_ii' => 'Real D Rentang 2 Ii',
            'real_e_rentang_1_i' => 'Real E Rentang 1 I',
            'real_e_rentang_1_ii' => 'Real E Rentang 1 Ii',
            'real_e_rentang_2_i' => 'Real E Rentang 2 I',
            'real_e_rentang_2_ii' => 'Real E Rentang 2 Ii',
            'real_f_rentang_1_i' => 'Real F Rentang 1 I',
            'real_f_rentang_1_ii' => 'Real F Rentang 1 Ii',
            'real_f_rentang_2_i' => 'Real F Rentang 2 I',
            'real_f_rentang_2_ii' => 'Real F Rentang 2 Ii',
            'bc_sub_bobot' => 'Bc Sub Bobot',
            'bmb_capaian' => 'Bmb Capaian',
            'bmb_nilai_sementara' => 'Bmb Nilai Sementara',
            'bmb_total_poin_sementara' => 'Bmb Total Poin Sementara',
            'bmb_catatan' => 'Keterangan',
            'final_capaian' => 'Final Capaian',
            'final_nilai_sementara' => 'Final Nilai Sementara',
            'final_total_poin_sementara' => 'Final Total Poin Sementara',
            'final_catatan' => 'Final Catatan',
        ];
    }
}
