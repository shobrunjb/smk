<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ProjectMstType;

/**
 * ProjectMstTypeSearch represents the model behind the search form of `backend\models\ProjectMstType`.
 */
class ProjectMstTypeSearch extends ProjectMstType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project_mst_type', 'is_active'], 'integer'],
            [['project_type', 'deskripsi'], 'safe'],
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
        $query = ProjectMstType::find();

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
            'id_project_mst_type' => $this->id_project_mst_type,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'project_type', $this->project_type])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);

        return $dataProvider;
    }
}
