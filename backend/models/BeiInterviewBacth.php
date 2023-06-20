<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bei_interview_batch".
 *
 * @property string $id_bei_interview_batch
 * @property string $nama_batch
 * @property int $jumlah_peserta
 * @property string $keterangan
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property string $created_date
 * @property string $created_user
 * @property string $created_ip_address
 * @property string $modified_date
 * @property string $modified_user
 * @property string $modified_ip_address
 */
class BeiInterviewBacth extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bei_interview_batch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_batch', 'tanggal_mulai', 'tanggal_selesai', 'created_date', 'created_user', 'created_ip_address'], 'required'],
            [['jumlah_peserta'], 'integer'],
            [['tanggal_mulai', 'tanggal_selesai', 'created_date', 'modified_date'], 'safe'],
            [['nama_batch', 'keterangan'], 'string', 'max' => 250],
            [['created_user', 'created_ip_address', 'modified_user', 'modified_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bei_interview_batch' => 'Id Bei Interview Batch',
            'nama_batch' => 'Nama Batch',
            'jumlah_peserta' => 'Jumlah Peserta',
            'keterangan' => 'Keterangan',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
            'created_date' => 'Created Date',
            'created_user' => 'Created User',
            'created_ip_address' => 'Created Ip Address',
            'modified_date' => 'Modified Date',
            'modified_user' => 'Modified User',
            'modified_ip_address' => 'Modified Ip Address',
        ];
    }
}
