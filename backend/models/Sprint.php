<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sprint".
 *
 * @property int $id_sprint
 * @property int $id_project
 * @property int $sprint_number
 * @property string|null $sprint_code
 * @property int|null $duration_in_week
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $note
 * @property int|null $is_active
 * @property int|null $is_locked
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class Sprint extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sprint';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project', 'sprint_number'], 'required'],
            [['id_project', 'sprint_number', 'duration_in_week', 'is_active', 'is_locked', 'created_id_user'], 'integer'],
            [['start_date', 'end_date', 'created_date'], 'safe'],
            [['note'], 'string'],
            [['sprint_code'], 'string', 'max' => 30],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sprint' => 'Id Sprint',
            'id_project' => 'Id Project',
            'sprint_number' => 'Sprint Number',
            'sprint_code' => 'Sprint Code',
            'duration_in_week' => 'Duration In Week',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'note' => 'Note',
            'is_active' => 'Is Active',
            'is_locked' => 'Is Locked',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id_project' => 'id_project']);
    }
}
