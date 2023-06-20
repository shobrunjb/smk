<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bei_interview_session".
 *
 * @property string $id_bei_interview_session
 * @property string $id_pegawai
 * @property string $session_date
 * @property int $last_position
 * @property string $last_question
 * @property string $last_hit
 * @property string $actual_start
 * @property string $actual_end
 * @property int $durasi menit
 * @property string $status
 * @property string $last_submit
 * @property int $stat_total_number_question
 * @property string $created_date
 * @property string $created_user
 * @property string $created_ip_address
 * @property string $modified_date
 * @property string $modified_user
 * @property string $modified_ip_address
 */
class BeiInterviewSession extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bei_interview_session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'session_date', 'actual_start', 'stat_total_number_question', 'created_date', 'created_user', 'created_ip_address', 'modified_date', 'modified_user', 'modified_ip_address'], 'required'],
            [['id_pegawai', 'last_position', 'last_hit', 'durasi', 'stat_total_number_question'], 'integer'],
            [['session_date', 'actual_start', 'actual_end', 'last_submit', 'created_date', 'modified_date'], 'safe'],
            [['last_question', 'status'], 'string'],
            [['created_user', 'created_ip_address', 'modified_user', 'modified_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bei_interview_session' => 'Id Bei Interview Session',
            'id_pegawai' => 'Id Pegawai',
            'session_date' => 'Session Date',
            'last_position' => 'Last Position',
            'last_question' => 'Last Question',
            'last_hit' => 'Last Hit',
            'actual_start' => 'Actual Start',
            'actual_end' => 'Actual End',
            'durasi' => 'Durasi',
            'status' => 'Status',
            'last_submit' => 'Last Submit',
            'stat_total_number_question' => 'Stat Total Number Question',
            'created_date' => 'Created Date',
            'created_user' => 'Created User',
            'created_ip_address' => 'Created Ip Address',
            'modified_date' => 'Modified Date',
            'modified_user' => 'Modified User',
            'modified_ip_address' => 'Modified Ip Address',
        ];
    }

    public function getPegawai()
        {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_pegawai']);
        }
}
