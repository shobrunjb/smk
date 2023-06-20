<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AssetItemSearch represents the model behind the search form of `backend\models\AssetItem`.
 */
class AssetItemSearch extends AssetItem
{
    public $id_propinsi;
    public $id_kelurahan;
    public $id_kecamatan;
    public $id_kabupaten;
    public $bukti_kepemilikan;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item', 'id_asset_master', 'id_asset_received', 'id_asset_item_location',
                'id_type_asset_item1', 'id_type_asset_item2', 'id_type_asset_item3', 'id_type_asset_item4',
                'id_type_asset_item5'], 'integer'],
            [['number1', 'number2', 'number3', 'picture1', 'picture2', 'picture3', 'id_kabupaten', 'id_kecamatan', 'id_kelurahan', 'bukti_kepemilikan'], 'safe'],
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
        $query = AssetItem::find();

        $query->joinWith('assetItemLocation');

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
            'id_asset_received' => $this->id_asset_received,
            'asset_item.id_asset_item_location' => $this->id_asset_item_location,
            'id_type_asset_item1' => $this->id_type_asset_item1,
            'id_type_asset_item2' => $this->id_type_asset_item2,
            'id_type_asset_item3' => $this->id_type_asset_item3,
            'id_type_asset_item4' => $this->id_type_asset_item4,
            'id_type_asset_item5' => $this->id_type_asset_item5,
        ]);

        $query->andFilterWhere(['=', 'number1', $this->number1])
            ->andFilterWhere(['like', 'number2', $this->number2])
            ->andFilterWhere(['like', 'number3', $this->number3])
            ->andFilterWhere(['like', 'picture1', $this->picture1])
            ->andFilterWhere(['like', 'picture2', $this->picture2])
            ->andFilterWhere(['like', 'picture3', $this->picture3])
            ->andFilterWhere(['like', 'label1', $this->label1])
            ->andFilterWhere(['like', 'label2', $this->label2])
            ->andFilterWhere(['like', 'label3', $this->label3])
            ->andFilterWhere(['like', 'label4', $this->label4])
            ->andFilterWhere(['like', 'label5', $this->label5])
            ->andFilterWhere(['like', 'asset_item_location.keterangan1', $this->bukti_kepemilikan])
            ->andFilterWhere(['like', 'asset_item_location.id_propinsi', $this->id_propinsi])
            ->andFilterWhere(['like', 'asset_item_location.id_kelurahan', $this->id_kelurahan])
            ->andFilterWhere(['like', 'asset_item_location.id_kecamatan', $this->id_kecamatan])
            ->andFilterWhere(['like', 'asset_item_location.id_kabupaten', $this->id_kabupaten]);

        return $dataProvider;
    }
	
	
	/*
	Fungsi-fungsi yang diperlukan untuk rekapitulasi
	Kodifikasi Status Aset dilihat dari field status_active
	1 = Baik
	2 = Kurang Baik - Tetapi masih digunakan
	3 = Rusak (tidak bisa digunakan)
	11 = Dibuang / Dijual
	*/	
	public static function getTotalAsset(){ 
		$val = 0;
		$val = AssetItemSearch::getTotalAssetBadCondition() + AssetItemSearch::getTotalAssetBrokenCondition()
			+ AssetItemSearch::getTotalAssetGodCondition();

		return $val;
	}

	public static function getTotalAssetGodCondition(){	
		$val = 0;
		$val = AssetItem::find()
                    ->where(['status_active' => 1])
                    ->count();
		
		return $val;
	}
	
    public static function getTotalAssetBadCondition(){
        $val = 0;
		$val = AssetItem::find()
                    ->where(['status_active' => 2])
                    ->count();

        return $val;
    }
    public static function getTotalAssetBrokenCondition(){
        $val = 0;
		$val = AssetItem::find()
                    ->where(['status_active' => 3])
                    ->count();

        return $val;
    }
	
}
