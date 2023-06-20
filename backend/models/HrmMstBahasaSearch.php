<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HrmMstBahasa;

/**
 * HrmMstBahasaSearch represents the model behind the search form of `app\models\HrmMstBahasa`.
 */
class HrmMstBahasaSearch extends HrmMstBahasa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mst_bahasa', 
            // 'id_perusahaan',
             'is_used'], 'integer'],
            [['bahasa'], 'safe'],
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
        $query = HrmMstBahasa::find();

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
            'id_mst_bahasa' => $this->id_mst_bahasa,
            // 'id_perusahaan' => $this->id_perusahaan,
            'is_used' => $this->is_used,
        ]);

        $query->andFilterWhere(['like', 'bahasa', $this->bahasa]);

        return $dataProvider;
    }
}
