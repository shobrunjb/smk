<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bei_mst_category_predef_quest".
 *
 * @property int $id_bei_mst_category_predef_quest
 * @property string $category_predef_quest
 * @property int $is_active
 */
class BeiMstCategoryPredefQuest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bei_mst_category_predef_quest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_predef_quest', 'is_active'], 'required'],
            [['is_active'], 'integer'],
            [['category_predef_quest'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bei_mst_category_predef_quest' => 'Id Bei Mst Category Predef Quest',
            'category_predef_quest' => 'Jenis Kategori',
            'is_active' => 'Status',
        ];
    }
}
