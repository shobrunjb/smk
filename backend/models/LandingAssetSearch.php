<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\LandingAsset;

/**
 * LandingAssetSearch represents the model behind the search form of `backend\models\LandingAsset`.
 */
class LandingAssetSearch extends LandingAsset
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_landing_asset', 'id_jenis_landing_asset', 'id_parent', 'has_child', 'nomor', 'tahun', 'created_id_user'], 'integer'],
            [['judul', 'icon', 'file', 'created_date', 'created_ip_address', 'type'], 'safe'],
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
        $query = LandingAsset::find();

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
            'id_landing_asset' => $this->id_landing_asset,
            'id_jenis_landing_asset' => $this->id_jenis_landing_asset,
            'id_parent' => $this->id_parent,
            'has_child' => $this->has_child,
            'nomor' => $this->nomor,
            'tahun' => $this->tahun,
            'type' => $this->type,
            
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,

            //Statusnya dibuat fix khusus yang sudah disetujui saja
            //'status_approval' => 'DISETUJUI'
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $dataProvider->setSort([
            //'defaultOrder' => ['id_jenis_landing_asset'=>SORT_ASC, 'nomor'=>SORT_ASC, 'tahun'=>SORT_DESC]
            'defaultOrder' => ['id_jenis_landing_asset'=>SORT_ASC, 'nomor'=>SORT_DESC, 'triwulan'=>SORT_DESC, 'tahun'=>SORT_DESC]
        ]);

        return $dataProvider;
    }

    public function searchChildOnly($params)
    {
        $query = LandingAsset::find();

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
            'id_landing_asset' => $this->id_landing_asset,
            'id_jenis_landing_asset' => $this->id_jenis_landing_asset,
            'id_parent' => $this->id_parent,
            'has_child' => $this->has_child,
            'nomor' => $this->nomor,
            'tahun' => $this->tahun,
            'type' => $this->type,

            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
            //Statusnya dibuat fix khusus yang sudah disetujui saja
            //'status_approval' => 'DISETUJUI'
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address])
            ->andFilterWhere(
                           ['!=', 'id_parent', 0]);

        $dataProvider->setSort([
            'defaultOrder' => ['id_jenis_landing_asset'=>SORT_ASC, 'id_parent'=>SORT_ASC, 'nomor'=>SORT_ASC]
        ]);

        return $dataProvider;
    }

    public function searchUsulanChildOnly($params)
    {
        $query = LandingAsset::find();

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
            'id_landing_asset' => $this->id_landing_asset,
            'id_jenis_landing_asset' => $this->id_jenis_landing_asset,
            'id_parent' => $this->id_parent,
            'has_child' => $this->has_child,
            'nomor' => $this->nomor,
            'tahun' => $this->tahun,
            'type' => $this->type,
            
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
            //Statusnya dibuat fix khusus yang sudah disetujui saja
            //'status_approval' => 'BELUM'
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address])
            ->andFilterWhere(
                           ['!=', 'id_parent', 0]);

        $dataProvider->setSort([
            'defaultOrder' => ['created_date'=>SORT_DESC, 'created_id_user'=>SORT_ASC,  'id_jenis_landing_asset'=>SORT_ASC, 'id_parent'=>SORT_ASC, 'nomor'=>SORT_ASC]
        ]);

        return $dataProvider;
    }

    public function searchUsulanApprovedChildOnly($params)
    {
        $query = LandingAsset::find();

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
            'id_landing_asset' => $this->id_landing_asset,
            'id_jenis_landing_asset' => $this->id_jenis_landing_asset,
            'id_parent' => $this->id_parent,
            'has_child' => $this->has_child,
            'nomor' => $this->nomor,
            'tahun' => $this->tahun,
            'type' => $this->type,
            
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
            //Statusnya dibuat fix khusus yang sudah disetujui saja
            //'status_approval' => $this->status_approval
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address])
            ->andFilterWhere(['>', 'approval_userid', 0])
            //->andFilterWhere(['!=', 'status_approval', 'BELUM'])
            ->andFilterWhere(
                           ['!=', 'id_parent', 0]);

        $dataProvider->setSort([
            'defaultOrder' => ['created_date'=>SORT_DESC, 'created_id_user'=>SORT_ASC, 'id_jenis_landing_asset'=>SORT_ASC, 'id_parent'=>SORT_ASC, 'nomor'=>SORT_ASC]
        ]);

        return $dataProvider;
    }
}
