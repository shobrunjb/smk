<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BeiInterviewSequence;

/**
 * BeiInterviewSequenceSearch represents the model behind the search form of `backend\models\BeiInterviewSequence`.
 */
class BeiInterviewSequenceSearch extends BeiInterviewSequence
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bei_interview_sequence', 'id_bei_interview_batch', 'no', 'id_bei_mst_category_predef_quest', 'id_bei_sequence'], 'integer'],
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
        $query = BeiInterviewSequence::find();

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
            'id_bei_interview_sequence' => $this->id_bei_interview_sequence,
            'id_bei_interview_batch' => $this->id_bei_interview_batch,
            'no' => $this->no,
            'id_bei_mst_category_predef_quest' => $this->id_bei_mst_category_predef_quest,
            'id_bei_sequence' => $this->id_bei_sequence,
        ]);

        return $dataProvider;
    }
}
