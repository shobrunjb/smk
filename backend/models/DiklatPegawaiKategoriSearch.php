<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DiklatPegawaiKategori;

/**
 * DiklatPegawaiKategoriSearch represents the model behind the search form of `backend\models\DiklatPegawaiKategori`.
 */
class DiklatPegawaiKategoriSearch extends DiklatPegawaiKategori
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_diklat_pegawai_kategori'], 'integer'],
            [['Kategori'], 'safe'],
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
        $query = DiklatPegawaiKategori::find();

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
            'id_diklat_pegawai_kategori' => $this->id_diklat_pegawai_kategori,
        ]);

        $query->andFilterWhere(['like', 'Kategori', $this->Kategori]);

        return $dataProvider;
    }
}
