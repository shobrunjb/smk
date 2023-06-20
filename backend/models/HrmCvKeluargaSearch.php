<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HrmCvKeluarga;

/**
 * HrmCvKeluargaSearch represents the model behind the search form of `backend\models\HrmCvKeluarga`.
 */
class HrmCvKeluargaSearch extends HrmCvKeluarga
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_keluarga', 'code_id', 'id_pegawai', 'id_mst_jenis_hub_keluarga', 'usia', 'usia_lebih_bulan', 'status_tunjangan'], 'integer'],
            [['kategori', 'nama_lengkap', 'foto', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'status', 'pekerjaan', 'tanggal_menikah', 'tanggal_bercerai', 'tanggal_meninggal', 'golongan_darah', 'agama', 'status_pernikahan', 'tanggal_tunjangan', 'created_date', 'created_user', 'created_ip_address', 'modified_date', 'modified_user', 'modified_ip_address'], 'safe'],
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
        $query = HrmCvKeluarga::find();

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
            'id_keluarga' => $this->id_keluarga,
            'code_id' => $this->code_id,
            'id_pegawai' => $this->id_pegawai,
            'id_mst_jenis_hub_keluarga' => $this->id_mst_jenis_hub_keluarga,
            'tanggal_lahir' => $this->tanggal_lahir,
            'usia' => $this->usia,
            'usia_lebih_bulan' => $this->usia_lebih_bulan,
            'tanggal_menikah' => $this->tanggal_menikah,
            'tanggal_bercerai' => $this->tanggal_bercerai,
            'tanggal_meninggal' => $this->tanggal_meninggal,
            'status_tunjangan' => $this->status_tunjangan,
            'tanggal_tunjangan' => $this->tanggal_tunjangan,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'kategori', $this->kategori])
            ->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan])
            ->andFilterWhere(['like', 'golongan_darah', $this->golongan_darah])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'status_pernikahan', $this->status_pernikahan])
            ->andFilterWhere(['like', 'created_user', $this->created_user])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address])
            ->andFilterWhere(['like', 'modified_user', $this->modified_user])
            ->andFilterWhere(['like', 'modified_ip_address', $this->modified_ip_address]);

        return $dataProvider;
    }
}
