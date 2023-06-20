<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HrmCvLanguageSkill;

/**
 * HrmCvLanguageSkillSearch represents the model behind the search form of `backend\models\HrmCvLanguageSkill`.
 */
class HrmCvLanguageSkillSearch extends HrmCvLanguageSkill
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_language_skill', 'code_id', 'id_pegawai', 'id_mst_bahasa', 'punya_sertifikat'], 'integer'],
            [['bahasa', 'tingkat_keahlian', 'sertifikat', 'foto_sertifikat', 'created_date', 'created_user', 'created_ip_address', 'modified_date', 'modified_user', 'modified_ip_address'], 'safe'],
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
        $query = HrmCvLanguageSkill::find();

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
            'id_language_skill' => $this->id_language_skill,
            'code_id' => $this->code_id,
            'id_pegawai' => $this->id_pegawai,
            'id_mst_bahasa' => $this->id_mst_bahasa,
            'punya_sertifikat' => $this->punya_sertifikat,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'bahasa', $this->bahasa])
            ->andFilterWhere(['like', 'tingkat_keahlian', $this->tingkat_keahlian])
            ->andFilterWhere(['like', 'sertifikat', $this->sertifikat])
            ->andFilterWhere(['like', 'foto_sertifikat', $this->foto_sertifikat])
            ->andFilterWhere(['like', 'created_user', $this->created_user])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address])
            ->andFilterWhere(['like', 'modified_user', $this->modified_user])
            ->andFilterWhere(['like', 'modified_ip_address', $this->modified_ip_address]);

        return $dataProvider;
    }
}
