<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AbsensiLog;

/**
 * AbsensiLogSearch represents the model behind the search form of `backend\models\AbsensiLog`.
 */
class AbsensiLogSearch extends AbsensiLog
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_absensi_log', 'id_pegawai', 'id_absensi_type', 'id_kantor'], 'integer'],
            [['tanggal_absensi', 'waktu_absensi', 'latitude', 'longitude', 'foto_bukti'], 'safe'],
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
        $query = AbsensiLog::find();

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
            'id_absensi_log' => $this->id_absensi_log,
            'id_pegawai' => $this->id_pegawai,
            'tanggal_absensi' => $this->tanggal_absensi,
            'waktu_absensi' => $this->waktu_absensi,
            'id_absensi_type' => $this->id_absensi_type,
            'id_kantor' => $this->id_kantor,
        ]);

        $query->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'foto_bukti', $this->foto_bukti]);

        return $dataProvider;
    }
}
