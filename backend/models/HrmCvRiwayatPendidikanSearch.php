<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HrmCvRiwayatPendidikan;

/**
 * HrmCvRiwayatPendidikanSearch represents the model behind the search form of `backend\models\HrmCvRiwayatPendidikan`.
 */
class HrmCvRiwayatPendidikanSearch extends HrmCvRiwayatPendidikan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_riwayat_pendidikan', 'code_id', 'id_pegawai', 'id_mst_tingkat_pendidikan', 'id_sekolah', 'dari', 'sampai', 'id_jurusan'], 'integer'],
            [['grade', 'foto_ijazah', 'foto_transkrip', 'created_date', 'created_user', 'created_ip_address', 'modified_date', 'modified_user', 'modified_ip_address'], 'safe'],
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
        $query = HrmCvRiwayatPendidikan::find();

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
            'id_riwayat_pendidikan' => $this->id_riwayat_pendidikan,
            'code_id' => $this->code_id,
            'id_pegawai' => $this->id_pegawai,
            'id_mst_tingkat_pendidikan' => $this->id_mst_tingkat_pendidikan,
            'id_sekolah' => $this->id_sekolah,
            'dari' => $this->dari,
            'sampai' => $this->sampai,
            'id_jurusan' => $this->id_jurusan,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'grade', $this->grade])
            ->andFilterWhere(['like', 'foto_ijazah', $this->foto_ijazah])
            ->andFilterWhere(['like', 'foto_transkrip', $this->foto_transkrip])
            ->andFilterWhere(['like', 'created_user', $this->created_user])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address])
            ->andFilterWhere(['like', 'modified_user', $this->modified_user])
            ->andFilterWhere(['like', 'modified_ip_address', $this->modified_ip_address]);

        return $dataProvider;
    }
}
