<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ScrumDaily;

/**
 * ScrumDailySearch represents the model behind the search form of `backend\models\ScrumDaily`.
 */
class ScrumDailySearch extends ScrumDaily
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_scrum_daily', 'id_project', 'id_sprint', 'id_pegawai', 'created_id_user'], 'integer'],
            [['standup_date', 'yesterday_todo', 'today_todo', 'obstacle', 'yesterday_bukti', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = ScrumDaily::find();

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
            'id_scrum_daily' => $this->id_scrum_daily,
            'id_project' => $this->id_project,
            'id_sprint' => $this->id_sprint,
            'id_pegawai' => $this->id_pegawai,
            'standup_date' => $this->standup_date,
            'created_date' => $this->created_date,
            'created_id_user' => $this->created_id_user,
        ]);

        $query->andFilterWhere(['like', 'yesterday_todo', $this->yesterday_todo])
            ->andFilterWhere(['like', 'today_todo', $this->today_todo])
            ->andFilterWhere(['like', 'obstacle', $this->obstacle])
            ->andFilterWhere(['like', 'yesterday_bukti', $this->yesterday_bukti])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $dataProvider->setSort([
            'defaultOrder' => ['standup_date' => SORT_DESC]
        ]);

        return $dataProvider;
    }
}
