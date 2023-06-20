<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "smk_periode".
 *
 * @property int $id_smk_periode
 * @property int $id_perusahaan
 * @property int $id_smk_mst_jenis_periode
 * @property int $tahun
 * @property int $periode_no
 * @property string $nama_periode
 * @property int $is_current_periode
 */
class SmkPeriode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smk_periode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_perusahaan', 'id_smk_mst_jenis_periode', 'tahun', 'periode_no', 'nama_periode'], 'required'],
            [['id_perusahaan', 'id_smk_mst_jenis_periode', 'tahun', 'periode_no', 'is_current_periode'], 'integer'],
            [['nama_periode'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_smk_periode' => 'Id Smk Periode',
            'id_perusahaan' => 'Id Perusahaan',
            'id_smk_mst_jenis_periode' => 'Id Smk Mst Jenis Periode',
            'tahun' => 'Tahun',
            'periode_no' => 'Periode No',
            'nama_periode' => 'Nama Periode',
            'is_current_periode' => 'Is Current Periode',
        ];
    }
}
