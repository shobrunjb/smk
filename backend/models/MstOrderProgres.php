<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mst_order_progres".
 *
 * @property int $id_mst_order_progres
 * @property string $order_progress
 */
class MstOrderProgres extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_order_progres';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_progress'], 'required'],
            [['order_progress'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_order_progres' => 'Id Mst Order Progres',
            'order_progress' => 'Order Progress',
        ];
    }
}
