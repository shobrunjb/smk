<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_backlog".
 *
 * @property int $id_product_backlog
 * @property int $id_project_mst_type
 * @property int $id_project
 * @property int|null $order_number
 * @property string $product_backlog
 * @property string|null $description
 * @property int|null $id_wiki_page
 * @property string|null $external_information
 * @property int|null $priority
 * @property int|null $load_estimatation
 * @property int|null $id_time_metric
 * @property int|null $id_sprint
 * @property int|null $progres_by_team
 * @property int|null $progres_by_owner
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class ProductBacklog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_backlog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project_mst_type', 'id_project', 'product_backlog', 'order_number'], 'required'],
            [['id_project_mst_type', 'id_project', 'order_number', 'id_wiki_page', 'priority', 'load_estimatation', 'id_time_metric', 'id_sprint', 'progres_by_team', 'progres_by_owner', 'created_id_user'], 'integer'],
            [['description'], 'string'],
            [['created_date'], 'safe'],
            [['product_backlog'], 'string', 'max' => 400],
            [['external_information'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_product_backlog' => 'Id Product Backlog',
            'id_project_mst_type' => 'Id Project Mst Type',
            'id_project' => 'Id Project',
            'order_number' => 'No Urut',
            'product_backlog' => 'Product Backlog',
            'description' => 'Description',
            'id_wiki_page' => 'Id Wiki Page',
            'external_information' => 'External Information',
            'priority' => 'Priority',
            'load_estimatation' => 'Estimasi Beban',
            'id_time_metric' => 'Satuan Waktu',
            'id_sprint' => 'Id Sprint',
            'progres_by_team' => 'Progres By Team',
            'progres_by_owner' => 'Progres By Owner',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id_project' => 'id_project']);
    }

    public function getSprint()
    {
        return $this->hasOne(Sprint::className(), ['id_sprint' => 'id_sprint']);
    }

    public function getSatuanWaktu()
    {
        return $this->hasOne(MstTimeMetric::className(), ['id_time_metric' => 'id_time_metric']);
    }
}
