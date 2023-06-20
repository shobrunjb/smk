<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_perusahaan_asuransi".
 *
 * @property int $id_hrm_perusahaan_asuransi
 * @property string $perusahaan_asuransi
 * @property string|null $deskripsi
 * @property string|null $alamat_kontak
 * @property string|null $telepon_kontak
 * @property string|null $email_kontak
 * @property int $active_status
 */
class HrmPerusahaanAsuransi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_perusahaan_asuransi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['perusahaan_asuransi'], 'required'],
            [['active_status'], 'integer'],
            [['perusahaan_asuransi', 'deskripsi', 'alamat_kontak', 'telepon_kontak', 'email_kontak'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hrm_perusahaan_asuransi' => 'Id Hrm Perusahaan Asuransi',
            'perusahaan_asuransi' => 'Perusahaan Asuransi',
            'deskripsi' => 'Deskripsi',
            'alamat_kontak' => 'Alamat Kontak',
            'telepon_kontak' => 'Telepon Kontak',
            'email_kontak' => 'Email Kontak',
            'active_status' => 'Active Status',
        ];
    }
}
