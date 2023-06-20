<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "smk_aspek_rentang_nilai".
 *
 * @property int $id_smk_aspek_rentang_nilai
 * @property string $nama_rentang_nilai
 * @property string $predikat
 * @property int $predikat_nilai
 * @property int|null $is_has_rentang
 * @property int|null $batas_bawah
 * @property int|null $batas_atas
 * @property string|null $label
 */
class SmkAspekRentangNilai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smk_aspek_rentang_nilai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_rentang_nilai', 'predikat', 'predikat_nilai'], 'required'],
            [['predikat_nilai', 'is_has_rentang', 'batas_bawah', 'batas_atas'], 'integer'],
            [['nama_rentang_nilai', 'label'], 'string', 'max' => 250],
            [['predikat'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_smk_aspek_rentang_nilai' => 'Id Smk Aspek Rentang Nilai',
            'nama_rentang_nilai' => 'Nama Rentang Nilai',
            'predikat' => 'Predikat',
            'predikat_nilai' => 'Predikat Nilai',
            'is_has_rentang' => 'Is Has Rentang',
            'batas_bawah' => 'Batas Bawah',
            'batas_atas' => 'Batas Atas',
            'label' => 'Label',
        ];
    }
}
