<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DataJurusan;

/**
 * DataJurusanSearch represents the model behind the search form of `backend\models\DataJurusan`.
 */
class DataJurusanSearch extends DataJurusan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jurusan', 'status'], 'integer'],
            [['nama_jurusan_id', 'nama_jurusan_en'], 'safe'],
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
        $query = DataJurusan::find();

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
            'id_jurusan' => $this->id_jurusan,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'nama_jurusan_id', $this->nama_jurusan_id])
            ->andFilterWhere(['like', 'nama_jurusan_en', $this->nama_jurusan_en]);

        return $dataProvider;
    }
}
