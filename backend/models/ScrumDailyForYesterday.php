<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "scrum_daily_for_yesterday".
 *
 * @property int $id_scrum_daily_for_yesterday
 * @property int $id_scrum_daily
 * @property int $id_sprint
 * @property int $id_pegawai
 * @property int $id_project
 * @property int $id_product_backlog
 * @property int $progres
 * @property int $progres_previous
 * @property int $kontribusi
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class ScrumDailyForYesterday extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scrum_daily_for_yesterday';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_scrum_daily', 'id_pegawai', 'id_product_backlog', 'progres'], 'required'],
            [['id_scrum_daily', 'id_sprint', 'id_pegawai', 'id_project', 'id_product_backlog', 'progres', 'progres_previous', 'kontribusi', 'created_id_user'], 'integer'],
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
            'id_scrum_daily_for_yesterday' => 'Id Scrum Daily For Yesterday',
            'id_scrum_daily' => 'Id Scrum Daily',
            'id_sprint' => 'Id Sprint',
            'id_pegawai' => 'Id Pegawai',
            'id_project' => 'Id Project',
            'id_product_backlog' => 'Id Product Backlog',
            'progres' => 'Progres',
            'progres_previous' => 'Progres Previous',
            'kontribusi' => 'Kontribusi',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getSprint()
    {
        return $this->hasOne(Sprint::className(), ['id_sprint' => 'id_sprint']);
    }

    public function getProductBacklog()
    {
        return $this->hasOne(ProductBacklog::className(), ['id_product_backlog' => 'id_product_backlog']);
    }

    public function getPegawai()
    {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }

    public function getScrumDaily()
    {
        return $this->hasOne(ScrumDaily::className(), ['id_scrum_daily' => 'id_scrum_daily']);
    }
}
