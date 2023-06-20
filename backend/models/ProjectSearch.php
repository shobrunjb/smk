<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Project;

/**
 * ProjectSearch represents the model behind the search form of `backend\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project', 'id_perusahaan', 'id_project_mst_type', 'kode_proyek', 'is_active', 'backlog_is_locked', 'created_id_user'], 'integer'],
            [['nama_proyek', 'description', 'repo_code', 'repo1', 'repo2', 'repo3', 'repo4', 'repo5', 'repo6', 'plan_start_date', 'plan_end_date', 'actual_start_date', 'actual_end_date', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = Project::find();

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
            'id_project' => $this->id_project,
            'id_perusahaan' => $this->id_perusahaan,
            'id_project_mst_type' => $this->id_project_mst_type,
            'kode_proyek' => $this->kode_proyek,
            'is_active' => $this->is_active,
            'backlog_is_locked' => $this->backlog_is_locked,
            'plan_start_date' => $this->plan_start_date,
            'plan_end_date' => $this->plan_end_date,
            'actual_start_date' => $this->actual_start_date,
            'actual_end_date' => $this->actual_end_date,
            'created_date' => $this->created_date,
            'created_id_user' => $this->created_id_user,
        ]);

        $query->andFilterWhere(['like', 'nama_proyek', $this->nama_proyek])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'repo_code', $this->repo_code])
            ->andFilterWhere(['like', 'repo1', $this->repo1])
            ->andFilterWhere(['like', 'repo2', $this->repo2])
            ->andFilterWhere(['like', 'repo3', $this->repo3])
            ->andFilterWhere(['like', 'repo4', $this->repo4])
            ->andFilterWhere(['like', 'repo5', $this->repo5])
            ->andFilterWhere(['like', 'repo6', $this->repo6])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
