<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kabupaten".
 *
 * @property int $id_kabupaten
 * @property int $id_propinsi
 * @property string $nama_kabupaten
 */
class Kabupaten extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kabupaten';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kabupaten', 'id_propinsi', 'nama_kabupaten'], 'required'],
            [['id_kabupaten', 'id_propinsi'], 'integer'],
            [['nama_kabupaten'], 'string', 'max' => 250],
            [['id_kabupaten'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kabupaten' => 'Id Kabupaten',
            'id_propinsi' => 'Id Propinsi',
            'nama_kabupaten' => 'Nama Kabupaten',
        ];
    }
}
