<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_cv_kesehatan".
 *
 * @property int $id_cv_kesehatan
 * @property int|null $code_id
 * @property int $id_pegawai
 * @property int $id_mst_jenis_tunjangan_kesehatan
 * @property string|null $penyakit_diderita
 * @property int $id_mst_jenis_penyakit
 * @property string $deskripsi_penyakit
 * @property string|null $tingkat
 * @property int|null $lama_sakit
 * @property int|null $ditanggung_perusahaan
 * @property string|null $tanggal_penggantian
 * @property float|null $biaya_ditanggung
 * @property string|null $created_date
 * @property string|null $created_user
 * @property string|null $created_ip_address
 * @property string|null $modified_date
 * @property string|null $modified_user
 * @property string|null $modified_ip_address
 */
class HrmCvKesehatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_cv_kesehatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code_id', 'id_pegawai', 'id_mst_jenis_tunjangan_kesehatan', 'id_mst_jenis_penyakit', 'lama_sakit', 'ditanggung_perusahaan'], 'integer'],
            [['id_pegawai', 'id_mst_jenis_tunjangan_kesehatan', 'id_mst_jenis_penyakit', 'deskripsi_penyakit'], 'required'],
            [['tingkat'], 'string'],
            [['tanggal_penggantian', 'created_date', 'modified_date'], 'safe'],
            [['biaya_ditanggung'], 'number'],
            [['penyakit_diderita'], 'string', 'max' => 150],
            [['deskripsi_penyakit'], 'string', 'max' => 250],
            [['created_user', 'created_ip_address', 'modified_user', 'modified_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cv_kesehatan' => 'Id Cv Kesehatan',
            'code_id' => 'Code ID',
            'id_pegawai' => 'Id Pegawai',
            'id_mst_jenis_tunjangan_kesehatan' => 'Jenis Tunjangan Kesehatan',
            'penyakit_diderita' => 'Penyakit Diderita',
            'id_mst_jenis_penyakit' => 'Jenis Penyakit',
            'deskripsi_penyakit' => 'Deskripsi Penyakit',
            'tingkat' => 'Tingkat',
            'lama_sakit' => 'Lama Sakit',
            'ditanggung_perusahaan' => 'Ditanggung Perusahaan',
            'tanggal_penggantian' => 'Tanggal Penggantian',
            'biaya_ditanggung' => 'Biaya Ditanggung',
            'created_date' => 'Created Date',
            'created_user' => 'Created User',
            'created_ip_address' => 'Created Ip Address',
            'modified_date' => 'Modified Date',
            'modified_user' => 'Modified User',
            'modified_ip_address' => 'Modified Ip Address',
        ];
    }
}
