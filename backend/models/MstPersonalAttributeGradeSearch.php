<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MstPersonalAttributeGrade;

/**
 * MstPersonalAttributeGradeSearch represents the model behind the search form of `backend\models\MstPersonalAttributeGrade`.
 */
class MstPersonalAttributeGradeSearch extends MstPersonalAttributeGrade
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mst_personal_attribute_grade', 'id_mst_personal_attribute', 'grade_value'], 'integer'],
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
        $query = MstPersonalAttributeGrade::find();

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
            'id_mst_personal_attribute_grade' => $this->id_mst_personal_attribute_grade,
            'id_mst_personal_attribute' => $this->id_mst_personal_attribute,
            'grade_value' => $this->grade_value,
        ]);

        $query->andFilterWhere(['like', 'grade_label', $this->grade_label])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        $dataProvider->setSort([
            'defaultOrder' => ['id_mst_personal_attribute'=>SORT_ASC]
        ]);
        
        return $dataProvider;
    }
}
