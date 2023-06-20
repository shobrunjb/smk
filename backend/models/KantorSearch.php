<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Kantor;

/**
 * KantorSearch represents the model behind the search form of `backend\models\Kantor`.
 */
class KantorSearch extends Kantor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kantor', 'id_kabupaten', 'id_provinsi', 'id_negara'], 'integer'],
            [['nama_kantor', 'alamat', 'longitude', 'latitude', 'keterangan'], 'safe'],
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
        $query = Kantor::find();

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
            'id_kantor' => $this->id_kantor,
            'id_kabupaten' => $this->id_kabupaten,
            'id_provinsi' => $this->id_provinsi,
            'id_negara' => $this->id_negara,
        ]);

        $query->andFilterWhere(['like', 'nama_kantor', $this->nama_kantor])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
