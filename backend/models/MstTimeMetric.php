<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mst_time_metric".
 *
 * @property int $id_time_metric
 * @property string $time_metric_id
 * @property string|null $time_metric_en
 * @property string|null $description
 */
class MstTimeMetric extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_time_metric';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time_metric_id'], 'required'],
            [['description'], 'string'],
            [['time_metric_id', 'time_metric_en'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_time_metric' => 'Id Time Metric',
            'time_metric_id' => 'Time Metric ID',
            'time_metric_en' => 'Time Metric En',
            'description' => 'Description',
        ];
    }
}
