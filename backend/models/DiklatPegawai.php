<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "diklat_pegawai".
 *
 * @property int $id_diklat
 * @property string $nama_diklat
 * @property string $tanggal_diklat
 * @property int $id_diklat_pegawai_kategori
 * @property string $penyelenggara
 * @property int $jumlah_peserta
 * @property string $syarat
 * @property string $deskripsi
 */
class DiklatPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diklat_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_diklat', 'tanggal_diklat', 'id_diklat_pegawai_kategori', 'penyelenggara', 'jumlah_peserta', 'syarat', 'deskripsi'], 'required'],
            [['tanggal_diklat'], 'safe'],
            [['id_diklat_pegawai_kategori', 'jumlah_peserta'], 'integer'],
            [['nama_diklat', 'syarat'], 'string', 'max' => 250],
            [['status'], 'string', 'max' => 10],
            [['penyelenggara'], 'string', 'max' => 50],
            [['deskripsi'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_diklat' => 'Id Diklat',
            'nama_diklat' => 'Nama Diklat',
            'tanggal_diklat' => 'Tanggal Diklat',
            'id_diklat_pegawai_kategori' => 'Kategori',
            'penyelenggara' => 'Penyelenggara',
            'jumlah_peserta' => 'Jumlah Peserta',
            'status' => 'Status',
            'syarat' => 'Syarat',
            'deskripsi' => 'Deskripsi',
        ];
    }
    public function getKategori()
    {
        return $this->hasOne(DiklatPegawaiKategori::className(), ['id_diklat_pegawai_kategori' => 'id_diklat_pegawai_kategori']);
    }
}
