<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "smk_jenis_penilaian".
 *
 * @property int $id_smk_jenis_penilaian
 * @property string $jenis_penilaian
 */
class SmkJenisPenilaian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smk_jenis_penilaian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_penilaian'], 'required'],
            [['jenis_penilaian'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_smk_jenis_penilaian' => 'Id Smk Jenis Penilaian',
            'jenis_penilaian' => 'Jenis Penilaian',
        ];
    }
}
