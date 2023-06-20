<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\JenisLandingAsset;

/**
 * JenisLandingAssetSearch represents the model behind the search form of `backend\models\JenisLandingAsset`.
 */
class JenisLandingAssetSearch extends JenisLandingAsset
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis_landing_asset', 'is_active'], 'integer'],
            [['jenis_landing_asset'], 'safe'],
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
        $query = JenisLandingAsset::find();

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
            'id_jenis_landing_asset' => $this->id_jenis_landing_asset,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'jenis_landing_asset', $this->jenis_landing_asset]);

        return $dataProvider;
    }
}
