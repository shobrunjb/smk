<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "data_sekolah".
 *
 * @property int $id_sekolah
 * @property int $code_id
 * @property string $nama_sekolah
 * @property string|null $nama_sekolah_short
 * @property string|null $alamat_sekolah
 * @property int $is_valid
 */
class DataSekolah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_sekolah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_sekolah'], 'required'],
            [['is_valid'], 'integer'],
            [['nama_sekolah', 'alamat_sekolah'], 'string', 'max' => 250],
            [['nama_sekolah_short'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sekolah' => 'Id Sekolah',
            'nama_sekolah' => 'Nama Sekolah',
            'nama_sekolah_short' => 'Nama Sekolah Short',
            'alamat_sekolah' => 'Alamat Sekolah',
            'is_valid' => 'Is Valid',
        ];
    }
}
