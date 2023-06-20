<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bei_compentecy_question".
 *
 * @property string $id_bei_compentecy_question
 * @property int $id_hrm_competency_dimension
 * @property string $question_ind
 * @property string $question_eng
 * @property int $number
 */
class BeiCompentecyQuestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bei_compentecy_question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hrm_competency_dimension', 'question_ind', 'question_eng', 'number'], 'required'],
            [['id_hrm_competency_dimension', 'number'], 'integer'],
            [['question_ind', 'question_eng'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bei_compentecy_question' => 'Id Bei Compentecy Question',
            'id_hrm_competency_dimension' => 'Jenis Kompetensi',
            'question_ind' => 'Pertanyaan Indonesia',
            'question_eng' => 'Pertanyaan Inggris',
            'number' => 'Number',
        ];
    }

    public function getCompetency()
    {
        return $this->hasOne(HrmCompetencyDimension::className(), ['id_hrm_competency_dimension' => 'id_hrm_competency_dimension']);
    }
}
