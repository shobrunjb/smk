<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ProEnvironmentAttribute;

/**
 * ProEnvironmentAttributeSearch represents the model behind the search form of `backend\models\ProEnvironmentAttribute`.
 */
class ProEnvironmentAttributeSearch extends ProEnvironmentAttribute
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pro_environment_attribute', 'id_environment', 'id_mst_environment_attribute', 'id_mst_environment_attribute_grade', 'created_id_user'], 'integer'],
            [['created_date', 'created_ip_address'], 'safe'],
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
        $query = ProEnvironmentAttribute::find();

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
            'id_pro_environment_attribute' => $this->id_pro_environment_attribute,
            'id_environment' => $this->id_environment,
            'id_mst_environment_attribute' => $this->id_mst_environment_attribute,
            'id_mst_environment_attribute_grade' => $this->id_mst_environment_attribute_grade,
            'created_date' => $this->created_date,
            'created_id_user' => $this->created_id_user,
        ]);

        $query->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
