<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetItemVehicle;

/**
 * AssetItemVehicleSearch represents the model behind the search form of `backend\models\AssetItemVehicle`.
 */
class AssetItemVehicleSearch extends AssetItemVehicle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item', 'id_asset_master', 'id_customer', 'id_asset_received', 'id_asset_item_location', 'id_type_asset_item1', 'id_type_asset_item2', 'id_type_asset_item3', 'id_type_asset_item4', 'id_type_asset_item5', 'status_active'], 'integer'],
            [['number1', 'number2', 'number3', 'kode_barcode', 'qrcode', 'link_code', 'picture1', 'picture2', 'picture3', 'picture4', 'picture5', 'caption_picture1', 'caption_picture2', 'caption_picture3', 'caption_picture4', 'caption_picture5', 'label1', 'label2', 'label3', 'label4', 'label5', 'file1', 'file2', 'file3'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AssetItemVehicle::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_asset_item' => $this->id_asset_item,
            'id_asset_master' => $this->id_asset_master,
            'id_customer' => $this->id_customer,
            'id_asset_received' => $this->id_asset_received,
            'id_asset_item_location' => $this->id_asset_item_location,
            'id_type_asset_item1' => $this->id_type_asset_item1,
            'id_type_asset_item2' => $this->id_type_asset_item2,
            'id_type_asset_item3' => $this->id_type_asset_item3,
            'id_type_asset_item4' => $this->id_type_asset_item4,
            'id_type_asset_item5' => $this->id_type_asset_item5,
            'status_active' => $this->status_active,
        ]);

        $query->andFilterWhere(['like', 'number1', $this->number1])
            ->andFilterWhere(['like', 'number2', $this->number2])
            ->andFilterWhere(['like', 'number3', $this->number3])
            ->andFilterWhere(['like', 'kode_barcode', $this->kode_barcode])
            ->andFilterWhere(['like', 'qrcode', $this->qrcode])
            ->andFilterWhere(['like', 'link_code', $this->link_code])
            ->andFilterWhere(['like', 'picture1', $this->picture1])
            ->andFilterWhere(['like', 'picture2', $this->picture2])
            ->andFilterWhere(['like', 'picture3', $this->picture3])
            ->andFilterWhere(['like', 'picture4', $this->picture4])
            ->andFilterWhere(['like', 'picture5', $this->picture5])
            ->andFilterWhere(['like', 'caption_picture1', $this->caption_picture1])
            ->andFilterWhere(['like', 'caption_picture2', $this->caption_picture2])
            ->andFilterWhere(['like', 'caption_picture3', $this->caption_picture3])
            ->andFilterWhere(['like', 'caption_picture4', $this->caption_picture4])
            ->andFilterWhere(['like', 'caption_picture5', $this->caption_picture5])
            ->andFilterWhere(['like', 'label1', $this->label1])
            ->andFilterWhere(['like', 'label2', $this->label2])
            ->andFilterWhere(['like', 'label3', $this->label3])
            ->andFilterWhere(['like', 'label4', $this->label4])
            ->andFilterWhere(['like', 'label5', $this->label5])
            ->andFilterWhere(['like', 'file1', $this->file1])
            ->andFilterWhere(['like', 'file2', $this->file2])
            ->andFilterWhere(['like', 'file3', $this->file3]);

        return $dataProvider;
    }
}
