<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HrmPerusahaanAsuransi;

/**
 * HrmPerusahaanAsuransiSearch represents the model behind the search form of `backend\models\HrmPerusahaanAsuransi`.
 */
class HrmPerusahaanAsuransiSearch extends HrmPerusahaanAsuransi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hrm_perusahaan_asuransi', 'active_status'], 'integer'],
            [['perusahaan_asuransi', 'deskripsi', 'alamat_kontak', 'telepon_kontak', 'email_kontak'], 'safe'],
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
        $query = HrmPerusahaanAsuransi::find();

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
            'id_hrm_perusahaan_asuransi' => $this->id_hrm_perusahaan_asuransi,
            'active_status' => $this->active_status,
        ]);

        $query->andFilterWhere(['like', 'perusahaan_asuransi', $this->perusahaan_asuransi])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'alamat_kontak', $this->alamat_kontak])
            ->andFilterWhere(['like', 'telepon_kontak', $this->telepon_kontak])
            ->andFilterWhere(['like', 'email_kontak', $this->email_kontak]);

        return $dataProvider;
    }
}
