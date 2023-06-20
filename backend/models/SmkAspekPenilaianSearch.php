<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SmkAspekPenilaian;

/**
 * SmkAspekPenilaianSearch represents the model behind the search form of `backend\models\SmkAspekPenilaian`.
 */
class SmkAspekPenilaianSearch extends SmkAspekPenilaian
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_aspek_penilaian', 'id_smk_skenario', 'id_perusahaan', 'mode', 'is_used'], 'integer'],
            [['aspek_penilaian', 'deskripsi', 'kategori'], 'safe'],
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
        $query = SmkAspekPenilaian::find();

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
            'id_aspek_penilaian' => $this->id_aspek_penilaian,
            'id_smk_skenario' => $this->id_smk_skenario,
            'id_perusahaan' => $this->id_perusahaan,
            'mode' => $this->mode,
            'is_used' => $this->is_used,
        ]);

        $query->andFilterWhere(['like', 'aspek_penilaian', $this->aspek_penilaian])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'kategori', $this->kategori]);

        return $dataProvider;
    }
}
