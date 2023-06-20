<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "project_mst_type".
 *
 * @property int $id_project_mst_type
 * @property string $project_type
 * @property string|null $deskripsi
 * @property int $is_active
 */
class ProjectMstType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_mst_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_type'], 'required'],
            [['deskripsi'], 'string'],
            [['is_active'], 'integer'],
            [['project_type'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_project_mst_type' => 'Id Project Mst Type',
            'project_type' => 'Project Type',
            'deskripsi' => 'Deskripsi',
            'is_active' => 'Is Active',
        ];
    }
}
