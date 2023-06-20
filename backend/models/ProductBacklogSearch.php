<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ProductBacklog;

/**
 * ProductBacklogSearch represents the model behind the search form of `backend\models\ProductBacklog`.
 */
class ProductBacklogSearch extends ProductBacklog
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product_backlog', 'id_project_mst_type', 'id_project', 'order_number', 'id_wiki_page', 'priority', 'load_estimatation', 'id_time_metric', 'id_sprint', 'progres_by_team', 'progres_by_owner', 'created_id_user'], 'integer'],
            [['product_backlog', 'description', 'external_information', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = ProductBacklog::find();

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
            'id_product_backlog' => $this->id_product_backlog,
            'id_project_mst_type' => $this->id_project_mst_type,
            'id_project' => $this->id_project,
            'order_number' => $this->order_number,
            'id_wiki_page' => $this->id_wiki_page,
            'priority' => $this->priority,
            'load_estimatation' => $this->load_estimatation,
            'id_time_metric' => $this->id_time_metric,
            'id_sprint' => $this->id_sprint,
            'progres_by_team' => $this->progres_by_team,
            'progres_by_owner' => $this->progres_by_owner,
            'created_date' => $this->created_date,
            'created_id_user' => $this->created_id_user,
        ]);

        $query->andFilterWhere(['like', 'product_backlog', $this->product_backlog])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'external_information', $this->external_information])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $dataProvider->setSort([
             'defaultOrder' => ['order_number' => SORT_ASC, 'priority' => SORT_ASC,]
        ]);

        return $dataProvider;
    }

    /*
    Untuk nyari data-data yang sudah ada dalam sprint
    */
    public function searchForOthers1($params)
    {
        $query = ProductBacklog::find();

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
            'id_product_backlog' => $this->id_product_backlog,
            'id_project_mst_type' => $this->id_project_mst_type,
            'id_project' => $this->id_project,
            'order_number' => $this->order_number,
            'id_wiki_page' => $this->id_wiki_page,
            'priority' => $this->priority,
            'load_estimatation' => $this->load_estimatation,
            'id_time_metric' => $this->id_time_metric,
            //'id_sprint' => $this->id_sprint,
            'progres_by_team' => $this->progres_by_team,
            'progres_by_owner' => $this->progres_by_owner,
            'created_date' => $this->created_date,
            'created_id_user' => $this->created_id_user,
        ]);

        $query->andFilterWhere(['like', 'product_backlog', $this->product_backlog])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['>', 'id_sprint', 0])
            ->andFilterWhere(['like', 'external_information', $this->external_information])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $dataProvider->setSort([
             'defaultOrder' => ['order_number' => SORT_ASC, 'priority' => SORT_ASC,]
        ]);

        return $dataProvider;
    }
}
