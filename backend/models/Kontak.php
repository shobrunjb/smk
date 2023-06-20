<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kontak".
 *
 * @property string $id_kontak
 * @property string $nama_perusahaan
 * @property string $nama_singkat
 * @property string $nama_panjang
 * @property string $id_perusahaan
 * @property string $Alamat
 * @property string $Phone1
 * @property string $Phone2
 * @property string $phone3
 * @property int $pobox
 * @property string $nama_kota
 * @property string $fax_number
 * @property string $nama_aplikasi
 * @property int $tahun_implementasi_pertama
 * @property string $Email
 * @property string $pin
 * @property string $logo
 */
class Kontak extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kontak';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_perusahaan', 'nama_singkat', 'nama_panjang', 'id_perusahaan', 'Alamat', 'Phone1', 'Phone2', 'phone3', 'pobox', 'nama_kota', 'fax_number', 'nama_aplikasi', 'Email', 'pin', 'logo'], 'required'],
            [['id_perusahaan', 'pobox', 'tahun_implementasi_pertama'], 'integer'],
            [['Alamat'], 'string'],
            [['nama_perusahaan', 'nama_kota'], 'string', 'max' => 50],
            [['nama_singkat', 'nama_panjang', 'Phone1', 'Phone2', 'fax_number', 'nama_aplikasi', 'Email', 'logo'], 'string', 'max' => 250],
            [['phone3', 'pin'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kontak' => 'Id Kontak',
            'nama_perusahaan' => 'Nama Perusahaan',
            'nama_singkat' => 'Nama Singkat',
            'nama_panjang' => 'Nama Panjang',
            'id_perusahaan' => 'Id Perusahaan',
            'Alamat' => 'Alamat',
            'Phone1' => 'Phone1',
            'Phone2' => 'Phone2',
            'phone3' => 'Phone3',
            'pobox' => 'Pobox',
            'nama_kota' => 'Nama Kota',
            'fax_number' => 'Fax Number',
            'nama_aplikasi' => 'Nama Aplikasi',
            'tahun_implementasi_pertama' => 'Tahun Implementasi Pertama',
            'Email' => 'Email',
            'pin' => 'Pin',
            'logo' => 'Logo',
        ];
    }

    public static function getCurrentContact(){
        $model=Kontak::model()->findByPk(1); //Default local user always defined by 78092015
        if($model===null)
            throw new CHttpException(404,'Settingan untuk data perusahaan awal belum benar. Silakan kontak administrator untuk melakukan perbaikannya');
        
        return $model;
    }
}
