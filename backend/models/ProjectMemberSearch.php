<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ProjectMember;

/**
 * ProjectMemberSearch represents the model behind the search form of `backend\models\ProjectMember`.
 */
class ProjectMemberSearch extends ProjectMember
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project_member', 'id_project', 'id_pegawai', 'id_project_mst_role', 'created_id_user'], 'integer'],
            [['start_date', 'end_date', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = ProjectMember::find();

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
            'id_project_member' => $this->id_project_member,
            'id_project' => $this->id_project,
            'id_pegawai' => $this->id_pegawai,
            'id_project_mst_role' => $this->id_project_mst_role,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'created_date' => $this->created_date,
            'created_id_user' => $this->created_id_user,
        ]);

        $query->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
