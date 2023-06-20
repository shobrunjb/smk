<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "perusahaan".
 *
 * @property int $id_perusahaan
 * @property string $perusahaan
 * @property string|null $deskripsi
 * @property string|null $alamat_kontak
 * @property string|null $telepon_kontak
 * @property string|null $email_kontak
 * @property int $active_status
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class Perusahaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perusahaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['perusahaan'], 'required'],
            [['active_status', 'created_id_user'], 'integer'],
            [['created_date'], 'safe'],
            [['perusahaan', 'deskripsi', 'alamat_kontak', 'telepon_kontak', 'email_kontak'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_perusahaan' => 'Id Perusahaan',
            'perusahaan' => 'Perusahaan',
            'deskripsi' => 'Deskripsi',
            'alamat_kontak' => 'Alamat Kontak',
            'telepon_kontak' => 'Telepon Kontak',
            'email_kontak' => 'Email Kontak',
            'active_status' => 'Active Status',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
