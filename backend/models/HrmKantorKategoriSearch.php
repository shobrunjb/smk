<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HrmKantorKategori;

/**
 * HrmKantorKategoriSearch represents the model behind the search form of `backend\models\HrmKantorKategori`.
 */
class HrmKantorKategoriSearch extends HrmKantorKategori
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hrm_kantor_kategori', 'id_parent_kategori', 'is_used'], 'integer'],
            [['kategori', 'keterangan'], 'safe'],
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
        $query = HrmKantorKategori::find();

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
            'id_hrm_kantor_kategori' => $this->id_hrm_kantor_kategori,
            'id_parent_kategori' => $this->id_parent_kategori,
            'is_used' => $this->is_used,
        ]);

        $query->andFilterWhere(['like', 'kategori', $this->kategori])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
