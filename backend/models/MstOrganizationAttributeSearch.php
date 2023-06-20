<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MstOrganizationAttribute;

/**
 * MstOrganizationAttributeSearch represents the model behind the search form of `backend\models\MstOrganizationAttribute`.
 */
class MstOrganizationAttributeSearch extends MstOrganizationAttribute
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mst_organization_attribute', 'is_active'], 'integer'],
            [['organization_attribute'], 'safe'],
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
        $query = MstOrganizationAttribute::find();

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
            'id_mst_organization_attribute' => $this->id_mst_organization_attribute,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'organization_attribute', $this->organization_attribute]);

        return $dataProvider;
    }
}
