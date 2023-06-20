<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BeiMstCategoryPredefQuest;

/**
 * BeiMstCategoryPredefQuestSearch represents the model behind the search form of `backend\models\BeiMstCategoryPredefQuest`.
 */
class BeiMstCategoryPredefQuestSearch extends BeiMstCategoryPredefQuest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bei_mst_category_predef_quest', 'is_active'], 'integer'],
            [['category_predef_quest'], 'safe'],
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
        $query = BeiMstCategoryPredefQuest::find();

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
            'id_bei_mst_category_predef_quest' => $this->id_bei_mst_category_predef_quest,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'category_predef_quest', $this->category_predef_quest]);

        return $dataProvider;
    }
}
