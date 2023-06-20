<?php

namespace backend\models;

use Yii;

// @property string $kode_jabatan
/**
 * This is the model class for table "jabatan".
 *
 * @property int $id_jabatan
 * @property int $id_struktur_organisasi
 * @property string $nama_jabatan
 * @property string|null $keterangan
 */
class Jabatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jabatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_struktur_organisasi','nama_jabatan'], 'required'],
            [['id_struktur_organisasi', 'kode_jabatan', 'nama_jabatan'], 'required'],
            [['id_struktur_organisasi'], 'integer'],
            [['kode_jabatan'], 'string', 'max' => 50],
            [['nama_jabatan', 'keterangan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jabatan' => 'Id Jabatan',
            'id_struktur_organisasi' => 'Struktur Organisasi',
            'kode_jabatan' => 'Kode Jabatan',
            'nama_jabatan' => 'Nama Jabatan',
            'keterangan' => 'Keterangan',
        ];
    }

}