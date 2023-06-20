<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "diklat_pegawai_kategori".
 *
 * @property int $id_diklat_pegawai_kategori
 * @property string $Kategori
 */
class DiklatPegawaiKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diklat_pegawai_kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Kategori'], 'required'],
            [['Kategori'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_diklat_pegawai_kategori' => 'Id Diklat Pegawai Kategori',
            'Kategori' => 'Kategori',
        ];
    }
}
