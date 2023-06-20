<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_competency_dimension_level".
 *
 * @property string $id_hrm_competency_dimension_level
 * @property int $id_hrm_competency_cluster
 * @property int $id_hrm_competency_category
 * @property int $id_hrm_competency_dimension
 * @property int $level
 * @property string $description_eng
 * @property string $description_ind
 */
class HrmCompetencyDimensionLevel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_competency_dimension_level';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hrm_competency_cluster', 'id_hrm_competency_category', 'id_hrm_competency_dimension', 'level', 'description_eng', 'description_ind'], 'required'],
            [['id_hrm_competency_cluster', 'id_hrm_competency_category', 'id_hrm_competency_dimension', 'level'], 'integer'],
            [['description_eng', 'description_ind'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hrm_competency_dimension_level' => 'Id Hrm Competency Dimension Level',
            'id_hrm_competency_cluster' => 'Id Hrm Competency Cluster',
            'id_hrm_competency_category' => 'Id Hrm Competency Category',
            'id_hrm_competency_dimension' => 'Id Hrm Competency Dimension',
            'level' => 'Level',
            'description_eng' => 'Description Eng',
            'description_ind' => 'Description Ind',
        ];
    }
}
