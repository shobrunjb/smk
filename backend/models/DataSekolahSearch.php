<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DataSekolah;

/**
 * DataSekolahSearch represents the model behind the search form of `backend\models\DataSekolah`.
 */
class DataSekolahSearch extends DataSekolah
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sekolah', 'is_valid'], 'integer'],
            [['nama_sekolah', 'nama_sekolah_short', 'alamat_sekolah'], 'safe'],
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
        $query = DataSekolah::find();

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
            'id_sekolah' => $this->id_sekolah,
            'is_valid' => $this->is_valid,
        ]);

        $query->andFilterWhere(['like', 'nama_sekolah', $this->nama_sekolah])
            ->andFilterWhere(['like', 'nama_sekolah_short', $this->nama_sekolah_short])
            ->andFilterWhere(['like', 'alamat_sekolah', $this->alamat_sekolah]);

        return $dataProvider;
    }
}
