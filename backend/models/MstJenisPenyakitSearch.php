<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MstJenisPenyakit;

/**
 * MstJenisPenyakitSearch represents the model behind the search form of `backend\models\MstJenisPenyakit`.
 */
class MstJenisPenyakitSearch extends MstJenisPenyakit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mst_jenis_penyakit'], 'integer'],
            [['jenis_penyakit', 'keterangan'], 'safe'],
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
        $query = MstJenisPenyakit::find();

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
            'id_mst_jenis_penyakit' => $this->id_mst_jenis_penyakit,
        ]);

        $query->andFilterWhere(['like', 'jenis_penyakit', $this->jenis_penyakit])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
