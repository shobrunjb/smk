<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BeiCompentecyQuestion;

/**
 * BeiCompentecyQuestionSearch represents the model behind the search form of `backend\models\BeiCompentecyQuestion`.
 */
class BeiCompentecyQuestionSearch extends BeiCompentecyQuestion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bei_compentecy_question', 'id_hrm_competency_dimension', 'number'], 'integer'],
            [['question_ind', 'question_eng'], 'safe'],
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
        $query = BeiCompentecyQuestion::find();

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
            'id_bei_compentecy_question' => $this->id_bei_compentecy_question,
            'id_hrm_competency_dimension' => $this->id_hrm_competency_dimension,
            'number' => $this->number,
        ]);

        $query->andFilterWhere(['like', 'question_ind', $this->question_ind])
            ->andFilterWhere(['like', 'question_eng', $this->question_eng]);

        return $dataProvider;
    }
}
