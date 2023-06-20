<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\mstOrderProgres;

/**
 * mstOrderProgressSearch represents the model behind the search form of `backend\models\mstOrderProgres`.
 */
class mstOrderProgressSearch extends mstOrderProgres
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mst_order_progres'], 'integer'],
            [['order_progress'], 'safe'],
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
        $query = mstOrderProgres::find();

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
            'id_mst_order_progres' => $this->id_mst_order_progres,
        ]);

        $query->andFilterWhere(['like', 'order_progress', $this->order_progress]);

        return $dataProvider;
    }
}
