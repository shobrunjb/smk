<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "smk_aspek_rencana".
 *
 * @property int $id_smk_aspek_rencana
 * @property string $type Menyatakan type dari SMK. Tahunan atau Per Periode/ Triwulan
 * @property int $tahun
 * @property int|null $id_smk_periode Informasi tentang periode. Misal TRIWULAN I, II, III, IV, dst. Jika typenya TAHUNAN maka boleh dikosongkan
 * @property string|null $sasaran
 * @property string $plan_sasaran
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
 * @property float|null $bc_sub_bobot
 */
class SmkAspekRencana extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smk_aspek_rencana';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[  'target', 'sasaran', 'sub_bobot','id_smk_jenis_penilaian' ], 'required'],
            [['type'], 'string'],
            [['tahun', 'id_smk_periode', 'id_smk_jenis_penilaian','id_smk_sasaran_position', 'no', 'rev', 'id_smk_mst_jenis_penilaian', 'id_aspek_penilaian', 'plan_id_smk_mst_jenis_penilaian', 'plan_id_aspek_penilaian'], 'integer'],
            [['sub_bobot', 'plan_sub_bobot', 'bc_sub_bobot'], 'number'],
            [['sasaran'], 'string', 'max' => 1000],
            [['plan_sasaran'], 'string', 'max' => 1200],
            [['rev_pre_sasaran'], 'string', 'max' => 100],
            [['target', 'ukuran_pencapaian', 'plan_target', 'plan_ukuran_pencapaian', 'plan_a_rentang_1_i', 'plan_a_rentang_1_ii', 'plan_a_rentang_2_i', 'plan_a_rentang_2_ii', 'plan_b_rentang_1_i', 'plan_b_rentang_1_ii', 'plan_b_rentang_2_i', 'plan_b_rentang_2_ii', 'plan_c_rentang_1_i', 'plan_c_rentang_1_ii', 'plan_c_rentang_2_i', 'plan_c_rentang_2_ii', 'plan_d_rentang_1_i', 'plan_d_rentang_1_ii', 'plan_d_rentang_2_i', 'plan_d_rentang_2_ii', 'plan_e_rentang_1_i', 'plan_e_rentang_1_ii', 'plan_e_rentang_2_i', 'plan_e_rentang_2_ii', 'plan_f_rentang_1_i', 'plan_f_rentang_1_ii', 'plan_f_rentang_2_i', 'plan_f_rentang_2_ii'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_smk_aspek_rencana' => 'Id Smk Aspek Rencana',
            'type' => 'Type',
            'tahun' => 'Tahun',
            'id_smk_periode' => 'Triwulan',
            'sasaran' => 'Indikator',
            'plan_sasaran' => 'Plan Sasaran',
            'id_smk_sasaran_position' => 'Id Smk Sasaran Position',
            'no' => 'No',
            'rev' => 'Rev',
            'rev_pre_sasaran' => 'Rev Pre Sasaran',
            'id_smk_jenis_penilaian' => 'Jenis Penilaian',
            'id_smk_mst_jenis_penilaian' => 'Id Smk Mst Jenis Penilaian',
            'id_aspek_penilaian' => 'Id Aspek Penilaian',
            'target' => 'Target Pencapaian',
            'ukuran_pencapaian' => 'Ukuran Pencapaian',
            'sub_bobot' => 'Sub Bobot',
            'plan_id_smk_mst_jenis_penilaian' => 'Plan Id Smk Mst Jenis Penilaian',
            'plan_id_aspek_penilaian' => 'Plan Id Aspek Penilaian',
            'plan_target' => 'Plan Target',
            'plan_ukuran_pencapaian' => 'Plan Ukuran Pencapaian',
            'plan_sub_bobot' => 'Plan Sub Bobot',
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
            'bc_sub_bobot' => 'Bc Sub Bobot',
        ];
    }
}
