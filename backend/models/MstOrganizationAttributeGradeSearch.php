<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MstOrganizationAttributeGrade;

/**
 * MstOrganizationAttributeGradeSearch represents the model behind the search form of `backend\models\MstOrganizationAttributeGrade`.
 */
class MstOrganizationAttributeGradeSearch extends MstOrganizationAttributeGrade
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mst_organization_attribute_grade', 'id_mst_organization_attribute', 'grade_value'], 'integer'],
            [['grade_label', 'keterangan'], 'safe'],
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
        $query = MstOrganizationAttributeGrade::find();

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
            'id_mst_organization_attribute_grade' => $this->id_mst_organization_attribute_grade,
            'id_mst_organization_attribute' => $this->id_mst_organization_attribute,
            'grade_value' => $this->grade_value,
        ]);

        $query->andFilterWhere(['like', 'grade_label', $this->grade_label])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
