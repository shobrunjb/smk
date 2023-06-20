<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "smk_aspek_penilaian".
 *
 * @property int $id_aspek_penilaian
 * @property int $id_smk_skenario
 * @property int $id_perusahaan
 * @property string $aspek_penilaian
 * @property string|null $deskripsi
 * @property string $kategori
 * @property int|null $mode
 * @property int $is_used
 */
class SmkAspekPenilaian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smk_aspek_penilaian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_smk_skenario', 'id_perusahaan', 'aspek_penilaian', 'kategori'], 'required'],
            [['id_smk_skenario', 'id_perusahaan', 'mode', 'is_used'], 'integer'],
            [['kategori'], 'string'],
            [['aspek_penilaian', 'deskripsi'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_aspek_penilaian' => 'Id Aspek Penilaian',
            'id_smk_skenario' => 'Id Smk Skenario',
            'id_perusahaan' => 'Id Perusahaan',
            'aspek_penilaian' => 'Aspek Penilaian',
            'deskripsi' => 'Deskripsi',
            'kategori' => 'Kategori',
            'mode' => 'Mode',
            'is_used' => 'Is Used',
        ];
    }
}
