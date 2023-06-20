<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_item".
 *
 * @property int $id_asset_item
 * @property int $id_asset_master
 * @property string|null $number1
 * @property string|null $number2
 * @property string|null $number3
 * @property string|null $kode_barcode
 * @property string|null $qrcode
 * @property string|null $link_code
 * @property int $id_customer
 * @property string|null $picture1
 * @property string|null $picture2
 * @property string|null $picture3
 * @property string $picture4
 * @property string $picture5
 * @property string|null $caption_picture1
 * @property string|null $caption_picture2
 * @property string|null $caption_picture3
 * @property string|null $caption_picture4
 * @property string|null $caption_picture5
 * @property int $id_asset_received
 * @property int $id_asset_item_location
 * @property int $id_type_asset_item1
 * @property int $id_type_asset_item2
 * @property int $id_type_asset_item3
 * @property int $id_type_asset_item4
 * @property int $id_type_asset_item5
 * @property string $label1
 * @property string $label2
 * @property string $label3
 * @property string $label4
 * @property string $label5
 * @property string $file1
 * @property string $file2
 * @property string $file3
 * @property int $status_active
 */
class AssetItemVehicle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_master', 'id_customer', 'picture4', 'picture5', 'id_asset_received', 'id_asset_item_location', 'id_type_asset_item1', 'id_type_asset_item2', 'id_type_asset_item3', 'id_type_asset_item4', 'id_type_asset_item5', 'label1', 'label2', 'label3', 'label4', 'label5', 'file1', 'file2', 'file3', 'status_active'], 'required'],
            [['id_asset_master', 'id_customer', 'id_asset_received', 'id_asset_item_location', 'id_type_asset_item1', 'id_type_asset_item2', 'id_type_asset_item3', 'id_type_asset_item4', 'id_type_asset_item5', 'status_active'], 'integer'],
            [['number1', 'number2', 'number3', 'qrcode', 'picture1', 'picture2', 'picture3', 'picture4', 'picture5', 'caption_picture1', 'caption_picture2', 'caption_picture3', 'caption_picture4', 'caption_picture5'], 'string', 'max' => 250],
            [['kode_barcode', 'label1', 'label2', 'label3', 'label4', 'label5', 'file1', 'file2', 'file3'], 'string', 'max' => 50],
            [['link_code'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_item' => 'Id Asset Item',
            'id_asset_master' => 'Jenis Asset',
            'number1' => 'No. Aset',
            'number2' => 'No. Inventaris',
            'number3' => 'Number 3',
            'kode_barcode' => 'Kode Barcode',
            'qrcode' => 'Qrcode',
            'link_code' => 'Link Code',
            'id_customer' => 'Id Customer',
            'picture1' => 'Picture 1',
            'picture2' => 'Picture 2',
            'picture3' => 'Picture 3',
            'picture4' => 'Picture 4',
            'picture5' => 'Picture 5',
            'caption_picture1' => 'Caption Picture 1',
            'caption_picture2' => 'Caption Picture 2',
            'caption_picture3' => 'Caption Picture 3',
            'caption_picture4' => 'Caption Picture 4',
            'caption_picture5' => 'Caption Picture 5',
            'id_asset_received' => 'Id Asset Received',
            'id_asset_item_location' => 'Id Asset Item Location',
            'id_type_asset_item1' => 'Id Type Asset Item 1',
            'id_type_asset_item2' => 'Id Type Asset Item 2',
            'id_type_asset_item3' => 'Id Type Asset Item 3',
            'id_type_asset_item4' => 'Id Type Asset Item 4',
            'id_type_asset_item5' => 'Id Type Asset Item 5',
            'label1' => 'Label 1',
            'label2' => 'Label 2',
            'label3' => 'Label 3',
            'label4' => 'Label 4',
            'label5' => 'Label 5',
            'file1' => 'File 1',
            'file2' => 'File 2',
            'file3' => 'File 3',
            'status_active' => 'Status Active',
        ];
    }
    public function getAssetMaster()
    {
        return $this->hasOne(AssetMasterVehicle::className(), ['id_asset_master' => 'id_asset_master']);
    }
    public function getTypeAsset()
    {
        return $this->hasOne(TypeAsset1::className(), ['id_type_asset' => 'assetMaster.id_type_asset1']);
    }
}
