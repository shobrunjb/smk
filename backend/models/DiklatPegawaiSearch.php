<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DiklatPegawai;

/**
 * DiklatPegawaiSearch represents the model behind the search form of `backend\models\DiklatPegawai`.
 */
class DiklatPegawaiSearch extends DiklatPegawai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_diklat', 'id_diklat_pegawai_kategori', 'jumlah_peserta'], 'integer'],
            [['nama_diklat', 'tanggal_diklat', 'penyelenggara', 'syarat', 'deskripsi'], 'safe'],
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
        $query = DiklatPegawai::find();

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
            'id_diklat' => $this->id_diklat,
            'tanggal_diklat' => $this->tanggal_diklat,
            'id_diklat_pegawai_kategori' => $this->id_diklat_pegawai_kategori,
            'jumlah_peserta' => $this->jumlah_peserta,
        ]);

        $query->andFilterWhere(['like', 'nama_diklat', $this->nama_diklat])
            ->andFilterWhere(['like', 'penyelenggara', $this->penyelenggara])
            ->andFilterWhere(['like', 'syarat', $this->syarat])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);

        return $dataProvider;
    }
}
