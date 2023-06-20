<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "scrum_daily".
 *
 * @property int $id_scrum_daily
 * @property int $id_project
 * @property int $id_sprint
 * @property int $id_pegawai
 * @property string $standup_date
 * @property string|null $yesterday_todo
 * @property string $today_todo
 * @property string|null $obstacle
 * @property string|null $yesterday_bukti
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class ScrumDaily extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scrum_daily';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project', 'id_sprint', 'id_pegawai', 'standup_date', 'today_todo'], 'required'],
            [['id_project', 'id_sprint', 'id_pegawai', 'created_id_user'], 'integer'],
            [['standup_date', 'created_date'], 'safe'],
            [['yesterday_todo', 'today_todo', 'obstacle'], 'string', 'max' => 400],
            [['yesterday_bukti'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_scrum_daily' => 'Id Scrum Daily',
            'id_project' => 'Id Project',
            'id_sprint' => 'Id Sprint',
            'id_pegawai' => 'Id Pegawai',
            'standup_date' => 'Standup Date',
            'yesterday_todo' => 'Yesterday Todo',
            'today_todo' => 'Today Todo',
            'obstacle' => 'Obstacle',
            'yesterday_bukti' => 'Yesterday Bukti',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getPegawai()
    {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }
}
