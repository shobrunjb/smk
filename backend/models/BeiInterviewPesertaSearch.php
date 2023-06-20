<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BeiInterviewPeserta;

/**
 * BeiInterviewPesertaSearch represents the model behind the search form of `backend\models\BeiInterviewPeserta`.
 */
class BeiInterviewPesertaSearch extends BeiInterviewPeserta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bei_interview_peserta', 'id_bei_interview_batch', 'id_pegawai'], 'integer'],
            [['created_date', 'created_user', 'created_ip_address', 'modified_date', 'modified_user', 'modified_ip_address'], 'safe'],
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
        $query = BeiInterviewPeserta::find();

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
            'id_bei_interview_peserta' => $this->id_bei_interview_peserta,
            'id_bei_interview_batch' => $this->id_bei_interview_batch,
            'id_pegawai' => $this->id_pegawai,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'created_user', $this->created_user])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address])
            ->andFilterWhere(['like', 'modified_user', $this->modified_user])
            ->andFilterWhere(['like', 'modified_ip_address', $this->modified_ip_address]);

        return $dataProvider;
    }
}
