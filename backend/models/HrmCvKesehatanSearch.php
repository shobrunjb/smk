<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HrmCvKesehatan;

/**
 * HrmCvKesehatanSearch represents the model behind the search form of `backend\models\HrmCvKesehatan`.
 */
class HrmCvKesehatanSearch extends HrmCvKesehatan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cv_kesehatan', 'code_id', 'id_pegawai', 'id_mst_jenis_tunjangan_kesehatan', 'id_mst_jenis_penyakit', 'lama_sakit', 'ditanggung_perusahaan'], 'integer'],
            [['penyakit_diderita', 'deskripsi_penyakit', 'tingkat', 'tanggal_penggantian', 'created_date', 'created_user', 'created_ip_address', 'modified_date', 'modified_user', 'modified_ip_address'], 'safe'],
            [['biaya_ditanggung'], 'number'],
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
        $query = HrmCvKesehatan::find();

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
            'id_cv_kesehatan' => $this->id_cv_kesehatan,
            'code_id' => $this->code_id,
            'id_pegawai' => $this->id_pegawai,
            'id_mst_jenis_tunjangan_kesehatan' => $this->id_mst_jenis_tunjangan_kesehatan,
            'id_mst_jenis_penyakit' => $this->id_mst_jenis_penyakit,
            'lama_sakit' => $this->lama_sakit,
            'ditanggung_perusahaan' => $this->ditanggung_perusahaan,
            'tanggal_penggantian' => $this->tanggal_penggantian,
            'biaya_ditanggung' => $this->biaya_ditanggung,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'penyakit_diderita', $this->penyakit_diderita])
            ->andFilterWhere(['like', 'deskripsi_penyakit', $this->deskripsi_penyakit])
            ->andFilterWhere(['like', 'tingkat', $this->tingkat])
            ->andFilterWhere(['like', 'created_user', $this->created_user])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address])
            ->andFilterWhere(['like', 'modified_user', $this->modified_user])
            ->andFilterWhere(['like', 'modified_ip_address', $this->modified_ip_address]);

        return $dataProvider;
    }
}
