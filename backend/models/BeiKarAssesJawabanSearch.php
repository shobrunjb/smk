<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BeiKarAssesJawaban;

/**
 * BeiKarAssesJawabanSearch represents the model behind the search form of `backend\models\BeiKarAssesJawaban`.
 */
class BeiKarAssesJawabanSearch extends BeiKarAssesJawaban
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bei_kar_asses_jawaban', 'id_kompetensi_dasar', 'id_bei_compentecy_question', 'id_hrm_competency_dimension', 'id_bei_interview_session', 'id_pegawai'], 'integer'],
            [['soal', 'jawaban', 'key_verb', 'key_time', 'key_location', 'r_st', 'r_ar', 'modified_time', 'modified_user', 'modified_ip_address'], 'safe'],
            [['score_by_machine', 'score_by_asesor'], 'number'],
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
        $query = BeiKarAssesJawaban::find();

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
            'id_bei_kar_asses_jawaban' => $this->id_bei_kar_asses_jawaban,
            'id_kompetensi_dasar' => $this->id_kompetensi_dasar,
            'id_bei_compentecy_question' => $this->id_bei_compentecy_question,
            'id_hrm_competency_dimension' => $this->id_hrm_competency_dimension,
            'id_bei_interview_session' => $this->id_bei_interview_session,
            'id_pegawai' => $this->id_pegawai,
            'score_by_machine' => $this->score_by_machine,
            'score_by_asesor' => $this->score_by_asesor,
            'modified_time' => $this->modified_time,
        ]);

        $query->andFilterWhere(['like', 'soal', $this->soal])
            ->andFilterWhere(['like', 'jawaban', $this->jawaban])
            ->andFilterWhere(['like', 'key_verb', $this->key_verb])
            ->andFilterWhere(['like', 'key_time', $this->key_time])
            ->andFilterWhere(['like', 'key_location', $this->key_location])
            ->andFilterWhere(['like', 'r_st', $this->r_st])
            ->andFilterWhere(['like', 'r_ar', $this->r_ar])
            ->andFilterWhere(['like', 'modified_user', $this->modified_user])
            ->andFilterWhere(['like', 'modified_ip_address', $this->modified_ip_address]);

        return $dataProvider;
    }
}
