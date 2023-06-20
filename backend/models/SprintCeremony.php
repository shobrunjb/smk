<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sprint_ceremony".
 *
 * @property int $id_sprint_ceremony
 * @property int $id_project
 * @property int $id_sprint
 * @property string $ceremony
 * @property string $noted
 * @property string|null $external_notes1
 * @property string|null $external_notes2
 * @property string|null $external_notes3
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class SprintCeremony extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sprint_ceremony';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project', 'id_sprint', 'ceremony', 'noted'], 'required'],
            [['id_project', 'id_sprint', 'created_id_user'], 'integer'],
            [['ceremony', 'noted'], 'string'],
            [['created_date'], 'safe'],
            [['external_notes1', 'external_notes2', 'external_notes3'], 'string', 'max' => 300],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sprint_ceremony' => 'Id Sprint Ceremony',
            'id_project' => 'Id Project',
            'id_sprint' => 'Id Sprint',
            'ceremony' => 'Ceremony',
            'noted' => 'Noted',
            'external_notes1' => 'External Notes 1',
            'external_notes2' => 'External Notes 2',
            'external_notes3' => 'External Notes 3',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
