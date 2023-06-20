<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SprintCeremony;

/**
 * SprintCeremonySearch represents the model behind the search form of `backend\models\SprintCeremony`.
 */
class SprintCeremonySearch extends SprintCeremony
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sprint_ceremony', 'id_project', 'id_sprint', 'created_id_user'], 'integer'],
            [['ceremony', 'noted', 'external_notes1', 'external_notes2', 'external_notes3', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = SprintCeremony::find();

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
            'id_sprint_ceremony' => $this->id_sprint_ceremony,
            'id_project' => $this->id_project,
            'id_sprint' => $this->id_sprint,
            'created_date' => $this->created_date,
            'created_id_user' => $this->created_id_user,
        ]);

        $query->andFilterWhere(['like', 'ceremony', $this->ceremony])
            ->andFilterWhere(['like', 'noted', $this->noted])
            ->andFilterWhere(['like', 'external_notes1', $this->external_notes1])
            ->andFilterWhere(['like', 'external_notes2', $this->external_notes2])
            ->andFilterWhere(['like', 'external_notes3', $this->external_notes3])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
