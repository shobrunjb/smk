<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HrmCvRiwayatPekerjaan;

/**
 * HrmCvRiwayatPekerjaanSearch represents the model behind the search form of `backend\models\HrmCvRiwayatPekerjaan`.
 */
class HrmCvRiwayatPekerjaanSearch extends HrmCvRiwayatPekerjaan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_riwayat_pekerjaan', 'code_id', 'id_pegawai', 'tahun_mulai', 'tahun_selesai'], 'integer'],
            [['nama_perusahaan', 'jenis_pekerjaan', 'jabatan_terakhir', 'keterangan', 'created_date', 'created_user', 'created_ip_address', 'modified_date', 'modified_user', 'modified_ip_address'], 'safe'],
            [['gaji_bruto'], 'number'],
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
        $query = HrmCvRiwayatPekerjaan::find();

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
            'id_riwayat_pekerjaan' => $this->id_riwayat_pekerjaan,
            'code_id' => $this->code_id,
            'id_pegawai' => $this->id_pegawai,
            'tahun_mulai' => $this->tahun_mulai,
            'tahun_selesai' => $this->tahun_selesai,
            'gaji_bruto' => $this->gaji_bruto,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'nama_perusahaan', $this->nama_perusahaan])
            ->andFilterWhere(['like', 'jenis_pekerjaan', $this->jenis_pekerjaan])
            ->andFilterWhere(['like', 'jabatan_terakhir', $this->jabatan_terakhir])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'created_user', $this->created_user])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address])
            ->andFilterWhere(['like', 'modified_user', $this->modified_user])
            ->andFilterWhere(['like', 'modified_ip_address', $this->modified_ip_address]);

        return $dataProvider;
    }
}
