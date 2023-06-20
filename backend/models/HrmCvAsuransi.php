<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_cv_asuransi".
 *
 * @property int $id_cv_asuransi
 * @property int|null $code_id
 * @property int $id_pegawai
 * @property int $id_hrm_perusahaan_asuransi
 * @property int $id_hrm_mst_jenis_asuransi
 * @property int|null $ditanggung_perusahaan
 * @property string|null $tanggal_mulai_asuransi
 * @property string|null $tanggal_jatuh_tempo
 * @property int|null $durasi_asuransi
 * @property string|null $keterangan
 * @property string|null $created_date
 * @property string|null $created_user
 * @property string|null $created_ip_address
 * @property string|null $modified_date
 * @property string|null $modified_user
 * @property string|null $modified_ip_address
 */
class HrmCvAsuransi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_cv_asuransi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code_id', 'id_pegawai', 'id_hrm_perusahaan_asuransi', 'id_hrm_mst_jenis_asuransi', 'ditanggung_perusahaan', 'durasi_asuransi'], 'integer'],
            [['id_pegawai', 'id_hrm_perusahaan_asuransi', 'id_hrm_mst_jenis_asuransi'], 'required'],
            [['tanggal_mulai_asuransi', 'tanggal_jatuh_tempo', 'created_date', 'modified_date'], 'safe'],
            [['keterangan'], 'string', 'max' => 250],
            [['created_user', 'created_ip_address', 'modified_user', 'modified_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cv_asuransi' => 'Id Cv Asuransi',
            'code_id' => 'Code ID',
            'id_pegawai' => 'Id Pegawai',
            'id_hrm_perusahaan_asuransi' => 'Perusahaan Asuransi',
            'id_hrm_mst_jenis_asuransi' => 'Jenis Asuransi',
            'ditanggung_perusahaan' => 'Ditanggung Perusahaan',
            'tanggal_mulai_asuransi' => 'Tanggal Mulai Asuransi',
            'tanggal_jatuh_tempo' => 'Tanggal Jatuh Tempo',
            'durasi_asuransi' => 'Durasi Asuransi',
            'keterangan' => 'Keterangan',
            'created_date' => 'Created Date',
            'created_user' => 'Created User',
            'created_ip_address' => 'Created Ip Address',
            'modified_date' => 'Modified Date',
            'modified_user' => 'Modified User',
            'modified_ip_address' => 'Modified Ip Address',
        ];
    }
}
