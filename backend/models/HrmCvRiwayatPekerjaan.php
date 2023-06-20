<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_cv_riwayat_pekerjaan".
 *
 * @property int $id_riwayat_pekerjaan
 * @property int|null $code_id
 * @property int $id_pegawai
 * @property string $nama_perusahaan
 * @property string $jenis_pekerjaan
 * @property string $jabatan_terakhir
 * @property int $tahun_mulai
 * @property int $tahun_selesai
 * @property float|null $gaji_bruto
 * @property string|null $keterangan
 * @property string|null $created_date
 * @property string|null $created_user
 * @property string|null $created_ip_address
 * @property string|null $modified_date
 * @property string|null $modified_user
 * @property string|null $modified_ip_address
 */
class HrmCvRiwayatPekerjaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_cv_riwayat_pekerjaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code_id', 'id_pegawai', 'tahun_mulai', 'tahun_selesai'], 'integer'],
            [['id_pegawai', 'nama_perusahaan', 'jenis_pekerjaan', 'jabatan_terakhir', 'tahun_mulai', 'tahun_selesai'], 'required'],
            [['gaji_bruto'], 'number'],
            [['created_date', 'modified_date'], 'safe'],
            [['nama_perusahaan', 'jenis_pekerjaan', 'jabatan_terakhir', 'keterangan'], 'string', 'max' => 250],
            [['created_user', 'created_ip_address', 'modified_user', 'modified_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_riwayat_pekerjaan' => 'Id Riwayat Pekerjaan',
            'code_id' => 'Code ID',
            'id_pegawai' => 'Id Pegawai',
            'nama_perusahaan' => 'Nama Perusahaan',
            'jenis_pekerjaan' => 'Jenis Pekerjaan',
            'jabatan_terakhir' => 'Jabatan Terakhir',
            'tahun_mulai' => 'Tahun Mulai',
            'tahun_selesai' => 'Tahun Selesai',
            'gaji_bruto' => 'Gaji Bruto',
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
