<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MstEnvironmentAttribute;

/**
 * MstEnvironmentAttributeSearch represents the model behind the search form of `backend\models\MstEnvironmentAttribute`.
 */
class MstEnvironmentAttributeSearch extends MstEnvironmentAttribute
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mst_environment_attribute', 'is_active'], 'integer'],
            [['environment_attribute'], 'safe'],
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
        $query = MstEnvironmentAttribute::find();

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
            'id_mst_environment_attribute' => $this->id_mst_environment_attribute,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'environment_attribute', $this->environment_attribute]);

        return $dataProvider;
    }
}
