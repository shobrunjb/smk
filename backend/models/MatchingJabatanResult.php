<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "matching_jabatan_result".
 *
 * @property int $id_matching_jabatan_result
 * @property int $id_pegawai
 * @property int $id_jabatan
 * @property float $fit_value
 * @property string $acknowledge_individul_fit_label
 * @property int|null $acknowledge_individul_fit_grade
 */
class MatchingJabatanResult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matching_jabatan_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'id_jabatan', 'fit_value', 'acknowledge_individul_fit_label'], 'required'],
            [['id_pegawai', 'id_jabatan', 'acknowledge_individul_fit_grade'], 'integer'],
            [['fit_value'], 'number'],
            [['acknowledge_individul_fit_label'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_matching_jabatan_result' => 'Id Matching Jabatan Result',
            'id_pegawai' => 'Id Pegawai',
            'id_jabatan' => 'Id Jabatan',
            'fit_value' => 'Fit Value',
            'acknowledge_individul_fit_label' => 'Acknowledge Individul Fit Label',
            'acknowledge_individul_fit_grade' => 'Acknowledge Individul Fit Grade',
        ];
    }
}
