<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_cv_keluarga".
 *
 * @property int $id_keluarga
 * @property int|null $code_id
 * @property int $id_pegawai
 * @property string $kategori
 * @property int $id_mst_jenis_hub_keluarga
 * @property string $nama_lengkap
 * @property string|null $foto
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property int|null $usia
 * @property int|null $usia_lebih_bulan
 * @property string $jenis_kelamin
 * @property string $status
 * @property string|null $pekerjaan
 * @property string|null $tanggal_menikah
 * @property string|null $tanggal_bercerai
 * @property string|null $tanggal_meninggal
 * @property string|null $golongan_darah
 * @property string|null $agama
 * @property string|null $status_pernikahan
 * @property int|null $status_tunjangan
 * @property string|null $tanggal_tunjangan
 * @property string|null $created_date
 * @property string|null $created_user
 * @property string|null $created_ip_address
 * @property string|null $modified_date
 * @property string|null $modified_user
 * @property string|null $modified_ip_address
 */
class HrmCvKeluarga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_cv_keluarga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code_id', 'id_pegawai', 'id_mst_jenis_hub_keluarga', 'usia', 'usia_lebih_bulan', 'status_tunjangan'], 'integer'],
            [['id_pegawai', 'kategori', 'nama_lengkap', 'jenis_kelamin', 'status'], 'required'],
            [['kategori', 'jenis_kelamin', 'status', 'golongan_darah', 'agama', 'status_pernikahan'], 'string'],
            [['tanggal_lahir', 'tanggal_menikah', 'tanggal_bercerai', 'tanggal_meninggal', 'tanggal_tunjangan', 'created_date', 'modified_date'], 'safe'],
            [['nama_lengkap', 'foto', 'tempat_lahir', 'pekerjaan'], 'string', 'max' => 250],
            [['created_user', 'created_ip_address', 'modified_user', 'modified_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_keluarga' => 'Id Keluarga',
            'code_id' => 'Code ID',
            'id_pegawai' => 'Id Pegawai',
            'kategori' => 'Kategori',
            'id_mst_jenis_hub_keluarga' => 'Id Mst Jenis Hub Keluarga',
            'nama_lengkap' => 'Nama Lengkap',
            'foto' => 'Foto',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'usia' => 'Usia',
            'usia_lebih_bulan' => 'Usia Lebih Bulan',
            'jenis_kelamin' => 'Jenis Kelamin',
            'status' => 'Status',
            'pekerjaan' => 'Pekerjaan',
            'tanggal_menikah' => 'Tanggal Menikah',
            'tanggal_bercerai' => 'Tanggal Bercerai',
            'tanggal_meninggal' => 'Tanggal Meninggal',
            'golongan_darah' => 'Golongan Darah',
            'agama' => 'Agama',
            'status_pernikahan' => 'Status Pernikahan',
            'status_tunjangan' => 'Status Tunjangan',
            'tanggal_tunjangan' => 'Tanggal Tunjangan',
            'created_date' => 'Created Date',
            'created_user' => 'Created User',
            'created_ip_address' => 'Created Ip Address',
            'modified_date' => 'Modified Date',
            'modified_user' => 'Modified User',
            'modified_ip_address' => 'Modified Ip Address',
        ];
    }
}
