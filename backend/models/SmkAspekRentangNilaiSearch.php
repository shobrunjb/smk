<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SmkAspekRentangNilai;

/**
 * SmkAspekRentangNilaiSearch represents the model behind the search form of `backend\models\SmkAspekRentangNilai`.
 */
class SmkAspekRentangNilaiSearch extends SmkAspekRentangNilai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_smk_aspek_rentang_nilai', 'predikat_nilai', 'is_has_rentang', 'batas_bawah', 'batas_atas'], 'integer'],
            [['nama_rentang_nilai', 'predikat', 'label'], 'safe'],
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
        $query = SmkAspekRentangNilai::find();

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
            'id_smk_aspek_rentang_nilai' => $this->id_smk_aspek_rentang_nilai,
            'predikat_nilai' => $this->predikat_nilai,
            'is_has_rentang' => $this->is_has_rentang,
            'batas_bawah' => $this->batas_bawah,
            'batas_atas' => $this->batas_atas,
        ]);

        $query->andFilterWhere(['like', 'nama_rentang_nilai', $this->nama_rentang_nilai])
            ->andFilterWhere(['like', 'predikat', $this->predikat])
            ->andFilterWhere(['like', 'label', $this->label]);

        return $dataProvider;
    }
}
