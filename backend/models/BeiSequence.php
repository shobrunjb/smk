<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bei_sequence".
 *
 * @property int $id_bei_sequence
 * @property string $sequence_name
 * @property int $is_active
 */
class BeiSequence extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bei_sequence';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sequence_name'], 'required'],
            [['is_active'], 'integer'],
            [['sequence_name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bei_sequence' => 'Id Bei Sequence',
            'sequence_name' => 'Sequence Name',
            'is_active' => 'Is Active',
        ];
    }
}
