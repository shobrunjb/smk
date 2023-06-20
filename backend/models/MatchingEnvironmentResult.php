<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "matching_environment_result".
 *
 * @property int $id_matching_environment_result
 * @property int $id_pegawai
 * @property int $id_kabupaten
 * @property float $fit_value
 * @property string $acknowledge_individul_fit_label
 * @property int|null $acknowledge_individul_fit_grade
 * @property string $check
 */
class MatchingEnvironmentResult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matching_environment_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'id_kabupaten', 'fit_value', 'acknowledge_individul_fit_label', 'check'], 'required'],
            [['id_pegawai', 'id_kabupaten', 'acknowledge_individul_fit_grade'], 'integer'],
            [['fit_value'], 'number'],
            [['acknowledge_individul_fit_label'], 'string', 'max' => 250],
            [['check'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_matching_environment_result' => 'Id Matching Environment Result',
            'id_pegawai' => 'Id Pegawai',
            'id_kabupaten' => 'Id Kabupaten',
            'fit_value' => 'Fit Value',
            'acknowledge_individul_fit_label' => 'Acknowledge Individul Fit Label',
            'acknowledge_individul_fit_grade' => 'Acknowledge Individul Fit Grade',
            'check' => 'Check',
        ];
    }
}
