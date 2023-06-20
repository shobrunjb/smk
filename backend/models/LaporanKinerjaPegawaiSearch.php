<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\LaporanKinerjaPegawai;

/**
 * LaporanKinerjaPegawaiSearch represents the model behind the search form of `backend\models\LaporanKinerjaPegawai`.
 */
class LaporanKinerjaPegawaiSearch extends LaporanKinerjaPegawai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_laporan_kinerja', 'id_order_pegawai', 'id_pegawai'], 'integer'],
            [['deskripsi'], 'safe'],
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
        $query = LaporanKinerjaPegawai::find();

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
            'id_laporan_kinerja' => $this->id_laporan_kinerja,
            'id_order_pegawai' => $this->id_order_pegawai,
            'id_pegawai' => $this->id_pegawai,
        ]);

        $query->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);

        return $dataProvider;
    }
}
