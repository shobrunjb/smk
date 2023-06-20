<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "project_mst_role".
 *
 * @property int $id_project_mst_role
 * @property int $id_project_mst_type
 * @property string $role_name
 * @property string|null $icon
 * @property int $is_active
 * @property string|null $description
 */
class ProjectMstRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_mst_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project_mst_type', 'role_name'], 'required'],
            [['id_project_mst_type', 'is_active'], 'integer'],
            [['description'], 'string'],
            [['role_name', 'icon'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_project_mst_role' => 'Id Project Mst Role',
            'id_project_mst_type' => 'Id Project Mst Type',
            'role_name' => 'Role Name',
            'icon' => 'Icon',
            'is_active' => 'Is Active',
            'description' => 'Description',
        ];
    }
}
