<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ScrumDailyForNow;

/**
 * ScrumDailyForNowSearch represents the model behind the search form of `backend\models\ScrumDailyForNow`.
 */
class ScrumDailyForNowSearch extends ScrumDailyForNow
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_scrum_daily_for_now', 'id_scrum_daily', 'id_sprint_backlog', 'target', 'created_id_user'], 'integer'],
            [['created_date', 'created_ip_address'], 'safe'],
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
        $query = ScrumDailyForNow::find();

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
            'id_scrum_daily_for_now' => $this->id_scrum_daily_for_now,
            'id_scrum_daily' => $this->id_scrum_daily,
            'id_sprint_backlog' => $this->id_sprint_backlog,
            'target' => $this->target,
            'created_date' => $this->created_date,
            'created_id_user' => $this->created_id_user,
        ]);

        $query->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
