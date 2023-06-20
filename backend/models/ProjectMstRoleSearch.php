<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ProjectMstRole;

/**
 * ProjectMstRoleSearch represents the model behind the search form of `backend\models\ProjectMstRole`.
 */
class ProjectMstRoleSearch extends ProjectMstRole
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project_mst_role', 'id_project_mst_type', 'is_active'], 'integer'],
            [['role_name', 'icon', 'description'], 'safe'],
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
        $query = ProjectMstRole::find();

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
            'id_project_mst_role' => $this->id_project_mst_role,
            'id_project_mst_type' => $this->id_project_mst_type,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'role_name', $this->role_name])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
