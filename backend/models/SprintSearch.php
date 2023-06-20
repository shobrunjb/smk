<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sprint;

/**
 * SprintSearch represents the model behind the search form of `backend\models\Sprint`.
 */
class SprintSearch extends Sprint
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sprint', 'id_project', 'sprint_number', 'duration_in_week', 'is_active', 'is_locked', 'created_id_user'], 'integer'],
            [['sprint_code', 'start_date', 'end_date', 'note', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = Sprint::find();

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
            'id_sprint' => $this->id_sprint,
            'id_project' => $this->id_project,
            'sprint_number' => $this->sprint_number,
            'duration_in_week' => $this->duration_in_week,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'is_active' => $this->is_active,
            'is_locked' => $this->is_locked,
            'created_date' => $this->created_date,
            'created_id_user' => $this->created_id_user,
        ]);

        $query->andFilterWhere(['like', 'sprint_code', $this->sprint_code])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $dataProvider->setSort([
             'defaultOrder' => ['sprint_number' => SORT_ASC]
        ]);

        return $dataProvider;
    }
}
