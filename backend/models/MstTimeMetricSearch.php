<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MstTimeMetric;

/**
 * MstTimeMetricSearch represents the model behind the search form of `backend\models\MstTimeMetric`.
 */
class MstTimeMetricSearch extends MstTimeMetric
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_time_metric'], 'integer'],
            [['time_metric_id', 'time_metric_en', 'description'], 'safe'],
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
        $query = MstTimeMetric::find();

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
            'id_time_metric' => $this->id_time_metric,
        ]);

        $query->andFilterWhere(['like', 'time_metric_id', $this->time_metric_id])
            ->andFilterWhere(['like', 'time_metric_en', $this->time_metric_en])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
