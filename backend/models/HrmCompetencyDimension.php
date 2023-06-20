<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_competency_dimension".
 *
 * @property string $id_hrm_competency_dimension
 * @property int $id_hrm_competency_cluster
 * @property int $id_hrm_competency_category
 * @property string $competeny_dimension_eng
 * @property int $no
 * @property string $abbr_eng
 * @property string $description_eng
 * @property string $keywords_eng
 * @property string $competeny_dimension_ind
 * @property string $abbr_ind
 * @property string $description_ind
 * @property string $keywords_ind
 */
class HrmCompetencyDimension extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_competency_dimension';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hrm_competency_cluster', 'id_hrm_competency_category', 'competeny_dimension_eng', 'no', 'abbr_eng', 'description_eng', 'keywords_eng', 'competeny_dimension_ind', 'abbr_ind', 'description_ind', 'keywords_ind'], 'required'],
            [['id_hrm_competency_cluster', 'id_hrm_competency_category', 'no'], 'integer'],
            [['description_eng', 'description_ind'], 'string'],
            [['competeny_dimension_eng', 'keywords_eng', 'competeny_dimension_ind', 'keywords_ind'], 'string', 'max' => 250],
            [['abbr_eng', 'abbr_ind'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hrm_competency_dimension' => 'Competency Dimension',
            'id_hrm_competency_cluster' => 'Competency Cluster',
            'id_hrm_competency_category' => 'Competency Category',
            'competeny_dimension_eng' => 'Jenis Kompetensi (English)',
            'no' => 'No',
            'abbr_eng' => 'Keyword English',
            'description_eng' => 'Description English',
            'keywords_eng' => 'Keywords Eng',
            'competeny_dimension_ind' => 'Jenis Kompetensi (Indonesia)',
            'abbr_ind' => 'Keyword Indonesia',
            'description_ind' => 'Description Indonesia',
            'keywords_ind' => 'Keywords Indonesia',
        ];
    }
}
