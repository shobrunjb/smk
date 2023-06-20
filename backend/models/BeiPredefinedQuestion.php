<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bei_predefined_question".
 *
 * @property string $id_bei_predefined_question
 * @property string $question_ind
 * @property string $question_eng
 * @property int $number
 * @property int $id_bei_mst_category_predef_quest
 */
class BeiPredefinedQuestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bei_predefined_question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question_ind', 'question_eng', 'number', 'id_bei_mst_category_predef_quest'], 'required'],
            [['number', 'id_bei_mst_category_predef_quest'], 'integer'],
            [['question_ind', 'question_eng'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bei_predefined_question' => 'Id Bei Predefined Question',
            'question_ind' => 'Pertanyaan Indonesia',
            'question_eng' => 'Pertanyaan Inggris',
            'number' => 'Number',
            'id_bei_mst_category_predef_quest' => 'Jenis Kategori Pertanyaan',
        ];
    }

    public function getCategoryBei()
    {
        return $this->hasOne(BeiMstCategoryPredefQuest::className(), ['id_bei_mst_category_predef_quest' => 'id_bei_mst_category_predef_quest']);
    }
}
