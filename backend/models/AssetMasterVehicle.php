<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_master".
 *
 * @property int $id_asset_master
 * @property string $asset_name
 * @property int|null $id_asset_code
 * @property string $asset_code
 * @property int|null $id_account_code
 * @property int|null $id_mst_accrual
 * @property int|null $id_type_asset1
 * @property int|null $id_type_asset2
 * @property int|null $id_type_asset3
 * @property int|null $id_type_asset4
 * @property int|null $id_type_asset5
 * @property string|null $attribute1
 * @property string|null $attribute2
 * @property string|null $attribute3
 * @property string|null $attribute4
 * @property string|null $attribute5
 * @property string|null $deskripsi
 * @property string|null $status
 * @property int|null $number_series
 * @property string $date
 * @property int $id_supplier
 */
class AssetMasterVehicle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['asset_name', 'asset_code', 'date', 'id_supplier'], 'required'],
            [['id_asset_code', 'id_account_code', 'id_mst_accrual', 'id_type_asset1', 'id_type_asset2', 'id_type_asset3', 'id_type_asset4', 'id_type_asset5', 'number_series', 'id_supplier'], 'integer'],
            [['date'], 'safe'],
            [['asset_name', 'attribute1', 'attribute2', 'attribute3', 'attribute4', 'attribute5', 'deskripsi', 'status'], 'string', 'max' => 250],
            [['asset_code'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_master' => 'Id Asset Master',
            'asset_name' => 'Asset Name',
            'id_asset_code' => 'Id Asset Code',
            'asset_code' => 'Asset Code',
            'id_account_code' => 'Id Account Code',
            'id_mst_accrual' => 'Id Mst Accrual',
            'id_type_asset1' => 'Id Type Asset 1',
            'id_type_asset2' => 'Id Type Asset 2',
            'id_type_asset3' => 'Id Type Asset 3',
            'id_type_asset4' => 'Id Type Asset 4',
            'id_type_asset5' => 'Id Type Asset 5',
            'attribute1' => 'Attribute 1',
            'attribute2' => 'Attribute 2',
            'attribute3' => 'Attribute 3',
            'attribute4' => 'Attribute 4',
            'attribute5' => 'Attribute 5',
            'deskripsi' => 'Deskripsi',
            'status' => 'Status',
            'number_series' => 'Number Series',
            'date' => 'Date',
            'id_supplier' => 'Id Supplier',
        ];
    }
    public function getTypeAsset1()
    {
        return $this->hasOne(TypeAsset1::className(), ['id_type_asset' => 'id_type_asset1']);
    }
    public function getTypeAssetItem1()
    {
        return $this->hasOne(TypeAssetItem1::className(), ['id_type_asset' => 'id_type_asset_item1']);
    }

    public function getTypeAsset2()
    {
        return $this->hasOne(TypeAsset2::className(), ['id_type_asset' => 'id_type_asset2']);
    }

    public function getTypeAsset3()
    {
        return $this->hasOne(TypeAsset3::className(), ['id_type_asset' => 'id_type_asset3']);
    }

    public function getTypeAsset4()
    {
        return $this->hasOne(TypeAsset4::className(), ['id_type_asset' => 'id_type_asset4']);
    }

    public function getTypeAsset5()
    {
        return $this->hasOne(TypeAsset5::className(), ['id_type_asset' => 'id_type_asset5']);
    }
}
