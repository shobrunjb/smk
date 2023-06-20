<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\LandingHome;

/**
 * LandingHomeSearch represents the model behind the search form of `backend\models\LandingHome`.
 */
class LandingHomeSearch extends LandingHome
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_landing_home', 'page_number'], 'integer'],
            [['page_name', 'source_html'], 'safe'],
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
        $query = LandingHome::find();

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
            'id_landing_home' => $this->id_landing_home,
            'page_number' => $this->page_number,
        ]);

        $query->andFilterWhere(['like', 'page_name', $this->page_name])
            ->andFilterWhere(['like', 'source_html', $this->source_html]);

        $dataProvider->setSort([
            'defaultOrder' => ['page_number' => SORT_ASC]
        ]);

        return $dataProvider;
    }
}
