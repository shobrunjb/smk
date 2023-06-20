<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "smk_mst_jenis_periode".
 *
 * @property int $id_smk_mst_jenis_periode
 * @property int $id_perusahaan
 * @property string $jenis_periode
 * @property int $jumlah
 * @property string|null $deskripsi
 * @property int $is_used
 */
class SmkMstJenisPeriode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smk_mst_jenis_periode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_perusahaan', 'jenis_periode', 'jumlah'], 'required'],
            [['id_perusahaan', 'jumlah', 'is_used'], 'integer'],
            [['jenis_periode', 'deskripsi'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_smk_mst_jenis_periode' => 'Id Smk Mst Jenis Periode',
            'id_perusahaan' => 'Id Perusahaan',
            'jenis_periode' => 'Jenis Periode',
            'jumlah' => 'Jumlah',
            'deskripsi' => 'Deskripsi',
            'is_used' => 'Is Used',
        ];
    }
}
