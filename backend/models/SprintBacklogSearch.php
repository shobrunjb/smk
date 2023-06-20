<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SprintBacklog;

/**
 * SprintBacklogSearch represents the model behind the search form of `backend\models\SprintBacklog`.
 */
class SprintBacklogSearch extends SprintBacklog
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sprint_backlog', 'id_project', 'id_sprint', 'id_product_backlog', 'last_contribute_user', 'total_duration', 'id_time_metric', 'created_id_user'], 'integer'],
            [['start_work', 'end_work', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = SprintBacklog::find();

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
            'id_sprint_backlog' => $this->id_sprint_backlog,
            'id_project' => $this->id_project,
            'id_sprint' => $this->id_sprint,
            'id_product_backlog' => $this->id_product_backlog,
            'start_work' => $this->start_work,
            'end_work' => $this->end_work,
            'last_contribute_user' => $this->last_contribute_user,
            'total_duration' => $this->total_duration,
            'id_time_metric' => $this->id_time_metric,
            'created_date' => $this->created_date,
            'created_id_user' => $this->created_id_user,
        ]);

        $query->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }

    public function searchWithProductBacklog($params)
    {
        $query = SprintBacklog::find();
        $query->joinWith(['productBacklog']); //Nama relasinya
        $query->orderBy([ProductBacklog::tableName().'.order_number' => SORT_ASC]);
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
            'id_sprint_backlog' => $this->id_sprint_backlog,
             SprintBacklog::tableName().'.id_project' => $this->id_project,
             SprintBacklog::tableName().'.id_sprint' => $this->id_sprint,
            'id_product_backlog' => $this->id_product_backlog,
            'start_work' => $this->start_work,
            'end_work' => $this->end_work,
            'last_contribute_user' => $this->last_contribute_user,
            'total_duration' => $this->total_duration,
            'id_time_metric' => $this->id_time_metric,
            'created_date' => $this->created_date,
            'created_id_user' => $this->created_id_user,
        ]);

        $query->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);



        return $dataProvider;
    }
}
