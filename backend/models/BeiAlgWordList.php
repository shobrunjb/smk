<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bei_alg_word_list".
 *
 * @property string $id_bei_alg_word_list
 * @property int $id_hrm_competency_dimension
 * @property int $level
 * @property string $keyword
 * @property int $frequency
 */
class BeiAlgWordList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bei_alg_word_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hrm_competency_dimension', 'level', 'keyword', 'frequency'], 'required'],
            [['id_hrm_competency_dimension', 'level', 'frequency'], 'integer'],
            [['keyword'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bei_alg_word_list' => 'Id Bei Alg Word List',
            'id_hrm_competency_dimension' => 'Id Hrm Competency Dimension',
            'level' => 'Level',
            'keyword' => 'Keyword',
            'frequency' => 'Frequency',
        ];
    }
}
