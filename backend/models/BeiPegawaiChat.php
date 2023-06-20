<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bei_pegawai_chat".
 *
 * @property string $id_bei_pegawai_chat
 * @property int $id_pegawai
 * @property int $from_user_id
 * @property int $to_user_id
 * @property string $message
 * @property string $time_log
 * @property string $ipaddress_log
 * @property int $is_read
 * @property int $read_user_id
 */
class BeiPegawaiChat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bei_pegawai_chat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'from_user_id', 'to_user_id', 'message', 'time_log', 'read_user_id'], 'required'],
            [['id_pegawai', 'from_user_id', 'to_user_id', 'is_read', 'read_user_id'], 'integer'],
            [['time_log'], 'safe'],
            [['message'], 'string', 'max' => 250],
            [['ipaddress_log'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bei_pegawai_chat' => 'Id Bei Pegawai Chat',
            'id_pegawai' => 'Id Pegawai',
            'from_user_id' => 'From User ID',
            'to_user_id' => 'To User ID',
            'message' => 'Message',
            'time_log' => 'Time Log',
            'ipaddress_log' => 'Ipaddress Log',
            'is_read' => 'Is Read',
            'read_user_id' => 'Read User ID',
        ];
    }
}
