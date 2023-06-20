<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BeiPredefinedQuestion;

/**
 * BeiPredefinedQuestionSearch represents the model behind the search form of `backend\models\BeiPredefinedQuestion`.
 */
class BeiPredefinedQuestionSearch extends BeiPredefinedQuestion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bei_predefined_question', 'number', 'id_bei_mst_category_predef_quest'], 'integer'],
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
        $query = BeiPredefinedQuestion::find();

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
            'id_bei_predefined_question' => $this->id_bei_predefined_question,
            'number' => $this->number,
            'id_bei_mst_category_predef_quest' => $this->id_bei_mst_category_predef_quest,
        ]);

        $query->andFilterWhere(['like', 'question_ind', $this->question_ind])
            ->andFilterWhere(['like', 'question_eng', $this->question_eng]);

        return $dataProvider;
    }
}
