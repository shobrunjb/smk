<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "absensi_log".
 *
 * @property int $id_absensi_log
 * @property int $id_pegawai
 * @property string $tanggal_absensi
 * @property string $waktu_absensi
 * @property int $id_absensi_type
 * @property string|null $latitude
 * @property string|null $longitude
 * @property int|null $id_kantor
 * @property string|null $foto_bukti
 */
class AbsensiLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'absensi_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'tanggal_absensi', 'waktu_absensi', 'id_absensi_type'], 'required'],
            [['id_pegawai', 'id_absensi_type', 'id_kantor'], 'integer'],
            [['tanggal_absensi', 'waktu_absensi'], 'safe'],
            [['latitude', 'longitude'], 'string', 'max' => 64],
            [['foto_bukti'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_absensi_log' => 'Id Absensi Log',
            'id_pegawai' => 'Pegawai',
            'tanggal_absensi' => 'Tanggal Absensi',
            'waktu_absensi' => 'Waktu Absensi',
            'id_absensi_type' => 'Absensi Type',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'id_kantor' => 'Id Kantor',
            'foto_bukti' => 'Foto Bukti',
        ];
    }

    //Join table
    public function getPegawai()
    {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }
}
