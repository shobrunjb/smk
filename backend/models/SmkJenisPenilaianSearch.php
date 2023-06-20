<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SmkJenisPenilaian;

/**
 * SmkJenisPenilaianSearch represents the model behind the search form of `backend\models\SmkJenisPenilaian`.
 */
class SmkJenisPenilaianSearch extends SmkJenisPenilaian
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_smk_jenis_penilaian'], 'integer'],
            [['jenis_penilaian'], 'safe'],
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
        $query = SmkJenisPenilaian::find();

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
            'id_smk_jenis_penilaian' => $this->id_smk_jenis_penilaian,
        ]);

        $query->andFilterWhere(['like', 'jenis_penilaian', $this->jenis_penilaian]);

        return $dataProvider;
    }
}
