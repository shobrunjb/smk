<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bei_interview_sequence".
 *
 * @property string $id_bei_interview_sequence
 * @property string $id_bei_interview_batch
 * @property int $no
 * @property int $id_bei_mst_category_predef_quest
 * @property int $id_bei_sequence
 */
class BeiInterviewSequence extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bei_interview_sequence';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bei_interview_batch', 'no', 'id_bei_sequence'], 'required'],
            [['id_bei_interview_batch', 'no', 'id_bei_mst_category_predef_quest', 'id_bei_sequence'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bei_interview_sequence' => 'Id Bei Interview Sequence',
            'id_bei_interview_batch' => 'Id Bei Interview Batch',
            'no' => 'No',
            'id_bei_mst_category_predef_quest' => 'Id Bei Mst Category Predef Quest',
            'id_bei_sequence' => 'Id Bei Sequence',
        ];
    }

    public function getSequence()
    {
        return $this->hasOne(BeiSequence::className(), ['id_bei_sequence' => 'id_bei_sequence']);
    }
}
