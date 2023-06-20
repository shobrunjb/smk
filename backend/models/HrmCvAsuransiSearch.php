<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HrmCvAsuransi;

/**
 * HrmCvAsuransiSearch represents the model behind the search form of `backend\models\HrmCvAsuransi`.
 */
class HrmCvAsuransiSearch extends HrmCvAsuransi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cv_asuransi', 'code_id', 'id_pegawai', 'id_hrm_perusahaan_asuransi', 'id_hrm_mst_jenis_asuransi', 'ditanggung_perusahaan', 'durasi_asuransi'], 'integer'],
            [['tanggal_mulai_asuransi', 'tanggal_jatuh_tempo', 'keterangan', 'created_date', 'created_user', 'created_ip_address', 'modified_date', 'modified_user', 'modified_ip_address'], 'safe'],
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
        $query = HrmCvAsuransi::find();

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
            'id_cv_asuransi' => $this->id_cv_asuransi,
            'code_id' => $this->code_id,
            'id_pegawai' => $this->id_pegawai,
            'id_hrm_perusahaan_asuransi' => $this->id_hrm_perusahaan_asuransi,
            'id_hrm_mst_jenis_asuransi' => $this->id_hrm_mst_jenis_asuransi,
            'ditanggung_perusahaan' => $this->ditanggung_perusahaan,
            'tanggal_mulai_asuransi' => $this->tanggal_mulai_asuransi,
            'tanggal_jatuh_tempo' => $this->tanggal_jatuh_tempo,
            'durasi_asuransi' => $this->durasi_asuransi,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'created_user', $this->created_user])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address])
            ->andFilterWhere(['like', 'modified_user', $this->modified_user])
            ->andFilterWhere(['like', 'modified_ip_address', $this->modified_ip_address]);

        return $dataProvider;
    }
}
