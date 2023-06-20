<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bei_interview_peserta".
 *
 * @property string $id_bei_interview_peserta
 * @property string $id_bei_interview_batch
 * @property string $id_pegawai
 * @property string $created_date
 * @property string $created_user
 * @property string $created_ip_address
 * @property string $modified_date
 * @property string $modified_user
 * @property string $modified_ip_address
 */
class BeiInterviewPeserta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bei_interview_peserta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bei_interview_batch', 'id_pegawai', 'created_date', 'created_user', 'created_ip_address', 'modified_date', 'modified_user', 'modified_ip_address'], 'required'],
            [['id_bei_interview_batch', 'id_pegawai'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['created_user', 'created_ip_address', 'modified_user', 'modified_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bei_interview_peserta' => 'Id Bei Interview Peserta',
            'id_bei_interview_batch' => 'Id Bei Interview Batch',
            'id_pegawai' => 'Id Pegawai',
            'created_date' => 'Created Date',
            'created_user' => 'Created User',
            'created_ip_address' => 'Created Ip Address',
            'modified_date' => 'Modified Date',
            'modified_user' => 'Modified User',
            'modified_ip_address' => 'Modified Ip Address',
        ];
    }

    public function getInterviwBacth()
        {
        return $this->hasOne(BeiInterviewBacth::className(), ['id_bei_interview_batch' => 'id_bei_interview_batch']);
        }

    public function getPegawai()
        {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_pegawai']);
        }
}
