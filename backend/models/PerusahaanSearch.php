<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Perusahaan;

/**
 * PerusahaanSearch represents the model behind the search form of `backend\models\Perusahaan`.
 */
class PerusahaanSearch extends Perusahaan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_perusahaan', 'active_status', 'created_id_user'], 'integer'],
            [['perusahaan', 'deskripsi', 'alamat_kontak', 'telepon_kontak', 'email_kontak', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = Perusahaan::find();

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
            'id_perusahaan' => $this->id_perusahaan,
            'active_status' => $this->active_status,
            'created_date' => $this->created_date,
            'created_id_user' => $this->created_id_user,
        ]);

        $query->andFilterWhere(['like', 'perusahaan', $this->perusahaan])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'alamat_kontak', $this->alamat_kontak])
            ->andFilterWhere(['like', 'telepon_kontak', $this->telepon_kontak])
            ->andFilterWhere(['like', 'email_kontak', $this->email_kontak])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
