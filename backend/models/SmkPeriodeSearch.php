<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SmkPeriode;

/**
 * SmkPeriodeSearch represents the model behind the search form of `backend\models\SmkPeriode`.
 */
class SmkPeriodeSearch extends SmkPeriode
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_smk_periode', 'id_perusahaan', 'id_smk_mst_jenis_periode', 'tahun', 'periode_no', 'is_current_periode'], 'integer'],
            [['nama_periode'], 'safe'],
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
        $query = SmkPeriode::find();

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
            'id_smk_periode' => $this->id_smk_periode,
            'id_perusahaan' => $this->id_perusahaan,
            'id_smk_mst_jenis_periode' => $this->id_smk_mst_jenis_periode,
            'tahun' => $this->tahun,
            'periode_no' => $this->periode_no,
            'is_current_periode' => $this->is_current_periode,
        ]);

        $query->andFilterWhere(['like', 'nama_periode', $this->nama_periode]);

        return $dataProvider;
    }
}
