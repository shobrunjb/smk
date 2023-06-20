<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BeiSequence;

/**
 * BeiSequenceSearch represents the model behind the search form of `backend\models\BeiSequence`.
 */
class BeiSequenceSearch extends BeiSequence
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bei_sequence', 'is_active'], 'integer'],
            [['sequence_name'], 'safe'],
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
        $query = BeiSequence::find();

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
            'id_bei_sequence' => $this->id_bei_sequence,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'sequence_name', $this->sequence_name]);

        return $dataProvider;
    }

}
