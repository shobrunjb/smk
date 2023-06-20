<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "scrum_daily_for_now".
 *
 * @property int $id_scrum_daily_for_now
 * @property int $id_scrum_daily
 * @property int $id_sprint
 * @property int $id_pegawai
 * @property int $id_project
 * @property int $id_product_backlog
 * @property int $target
 * @property int $kontribusi
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class ScrumDailyForNow extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scrum_daily_for_now';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_scrum_daily', 'id_sprint', 'id_pegawai', 'id_project', 'id_product_backlog', 'target', 'kontribusi'], 'required'],
            [['id_scrum_daily', 'id_sprint', 'id_pegawai', 'id_project', 'id_product_backlog', 'target', 'kontribusi', 'created_id_user'], 'integer'],
            [['created_date'], 'safe'],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_scrum_daily_for_now' => 'Id Scrum Daily For Now',
            'id_scrum_daily' => 'Id Scrum Daily',
            'id_sprint' => 'Id Sprint',
            'id_pegawai' => 'Id Pegawai',
            'id_project' => 'Id Project',
            'id_product_backlog' => 'Id Product Backlog',
            'target' => 'Target',
            'kontribusi' => 'Kontribusi',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
