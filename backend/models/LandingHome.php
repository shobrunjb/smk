<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "landing_home".
 *
 * @property int $id_landing_home
 * @property int|null $page_number
 * @property string|null $page_name
 * @property string|null $source_html
 */
class LandingHome extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'landing_home';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_number','is_active'], 'integer'],
            [['source_html'], 'string'],
            [['page_name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_landing_home' => 'Id Landing Home',
            'page_number' => 'Page Number',
            'page_name' => 'Page Name',
            'source_html' => 'Source Html',
        ];
    }
}
