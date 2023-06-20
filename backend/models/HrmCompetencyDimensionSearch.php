<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HrmCompetencyDimension;

/**
 * HrmCompetencyDimensionSearch represents the model behind the search form of `backend\models\HrmCompetencyDimension`.
 */
class HrmCompetencyDimensionSearch extends HrmCompetencyDimension
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hrm_competency_dimension', 'id_hrm_competency_cluster', 'id_hrm_competency_category', 'no'], 'integer'],
            [['competeny_dimension_eng', 'abbr_eng', 'description_eng', 'keywords_eng', 'competeny_dimension_ind', 'abbr_ind', 'description_ind', 'keywords_ind'], 'safe'],
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
        //$query = HrmCompetencyDimension::find();
        $query = HrmCompetencyDimension::find()->where(['id_hrm_competency_cluster' => 301]);

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
            'id_hrm_competency_dimension' => $this->id_hrm_competency_dimension,
            'id_hrm_competency_cluster' => $this->id_hrm_competency_cluster,
            'id_hrm_competency_category' => $this->id_hrm_competency_category,
            'no' => $this->no,
        ]);

        $query->andFilterWhere(['like', 'competeny_dimension_eng', $this->competeny_dimension_eng])
            ->andFilterWhere(['like', 'abbr_eng', $this->abbr_eng])
            ->andFilterWhere(['like', 'description_eng', $this->description_eng])
            ->andFilterWhere(['like', 'keywords_eng', $this->keywords_eng])
            ->andFilterWhere(['like', 'competeny_dimension_ind', $this->competeny_dimension_ind])
            ->andFilterWhere(['like', 'abbr_ind', $this->abbr_ind])
            ->andFilterWhere(['like', 'description_ind', $this->description_ind])
            ->andFilterWhere(['like', 'keywords_ind', $this->keywords_ind]);

        return $dataProvider;
    }
}
