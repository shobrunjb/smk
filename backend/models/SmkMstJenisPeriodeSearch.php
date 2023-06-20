<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SmkMstJenisPeriode;

/**
 * SmkMstJenisPeriodeSearch represents the model behind the search form of `backend\models\SmkMstJenisPeriode`.
 */
class SmkMstJenisPeriodeSearch extends SmkMstJenisPeriode
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_smk_mst_jenis_periode', 'id_perusahaan', 'jumlah', 'is_used'], 'integer'],
            [['jenis_periode', 'deskripsi'], 'safe'],
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
        $query = SmkMstJenisPeriode::find();

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
            'id_smk_mst_jenis_periode' => $this->id_smk_mst_jenis_periode,
            'id_perusahaan' => $this->id_perusahaan,
            'jumlah' => $this->jumlah,
            'is_used' => $this->is_used,
        ]);

        $query->andFilterWhere(['like', 'jenis_periode', $this->jenis_periode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);

        return $dataProvider;
    }
}
