<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SmkPegawaiTahunan;

/**
 * SmkPegawaiTahunanSearch represents the model behind the search form of `backend\models\SmkPegawaiTahunan`.
 */
class SmkPegawaiTahunanSearch extends SmkPegawaiTahunan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_smk_pegawai_tahunan', 'id_smk_periode', 'year', 'id_pegawai', 'id_smk_pegawai_tahunan_parent', 'rev_no', 'id_hrm_organization_structure', 'id_hrm_organization_position', 'id_pegawai_atasan', 'id_hrm_organization_position_atasan', 'id_hrm_kantor', 'plan_is_changed', 'planchange_is_approved', 'plan_is_approved', 'plan_approval_id_pegawai', 'bimb_is_approved', 'bimb_approval_id_pegawai', 'is_approved', 'approval_id_pegawai', 'plan_status_completed', 'bimb_status_completed', 'final_status_completed', 'status'], 'integer'],
            [['type_periode', 'planchange_notes', 'plan_approval_date', 'plan_approval_ip_address', 'plan_approval_notes', 'bimb_approval_date', 'bimb_approval_ip_address', 'bimb_approval_notes', 'approval_date', 'approval_ip_address', 'approval_notes', 'nilai_angka', 'keterangan_nilai', 'bmb_nilai_angka', 'bmb_keterangan_nilai', 'final_nilai_angka', 'final_keterangan_nilai', 'keterangan', 'filename', 'created_date', 'created_user', 'created_ip_address'], 'safe'],
            [['nilai_point', 'bmb_nilai_point', 'final_nilai_point'], 'number'],
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
        $query = SmkPegawaiTahunan::find();

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
            'id_smk_pegawai_tahunan' => $this->id_smk_pegawai_tahunan,
            'id_smk_periode' => $this->id_smk_periode,
            'year' => $this->year,
            'id_pegawai' => $this->id_pegawai,
            'id_smk_pegawai_tahunan_parent' => $this->id_smk_pegawai_tahunan_parent,
            'rev_no' => $this->rev_no,
            'id_hrm_organization_structure' => $this->id_hrm_organization_structure,
            'id_hrm_organization_position' => $this->id_hrm_organization_position,
            'id_pegawai_atasan' => $this->id_pegawai_atasan,
            'id_hrm_organization_position_atasan' => $this->id_hrm_organization_position_atasan,
            'id_hrm_kantor' => $this->id_hrm_kantor,
            'plan_is_changed' => $this->plan_is_changed,
            'planchange_is_approved' => $this->planchange_is_approved,
            'plan_is_approved' => $this->plan_is_approved,
            'plan_approval_date' => $this->plan_approval_date,
            'plan_approval_id_pegawai' => $this->plan_approval_id_pegawai,
            'bimb_is_approved' => $this->bimb_is_approved,
            'bimb_approval_date' => $this->bimb_approval_date,
            'bimb_approval_id_pegawai' => $this->bimb_approval_id_pegawai,
            'is_approved' => $this->is_approved,
            'approval_date' => $this->approval_date,
            'approval_id_pegawai' => $this->approval_id_pegawai,
            'nilai_point' => $this->nilai_point,
            'bmb_nilai_point' => $this->bmb_nilai_point,
            'final_nilai_point' => $this->final_nilai_point,
            'plan_status_completed' => $this->plan_status_completed,
            'bimb_status_completed' => $this->bimb_status_completed,
            'final_status_completed' => $this->final_status_completed,
            'status' => $this->status,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'type_periode', $this->type_periode])
            ->andFilterWhere(['like', 'planchange_notes', $this->planchange_notes])
            ->andFilterWhere(['like', 'plan_approval_ip_address', $this->plan_approval_ip_address])
            ->andFilterWhere(['like', 'plan_approval_notes', $this->plan_approval_notes])
            ->andFilterWhere(['like', 'bimb_approval_ip_address', $this->bimb_approval_ip_address])
            ->andFilterWhere(['like', 'bimb_approval_notes', $this->bimb_approval_notes])
            ->andFilterWhere(['like', 'approval_ip_address', $this->approval_ip_address])
            ->andFilterWhere(['like', 'approval_notes', $this->approval_notes])
            ->andFilterWhere(['like', 'nilai_angka', $this->nilai_angka])
            ->andFilterWhere(['like', 'keterangan_nilai', $this->keterangan_nilai])
            ->andFilterWhere(['like', 'bmb_nilai_angka', $this->bmb_nilai_angka])
            ->andFilterWhere(['like', 'bmb_keterangan_nilai', $this->bmb_keterangan_nilai])
            ->andFilterWhere(['like', 'final_nilai_angka', $this->final_nilai_angka])
            ->andFilterWhere(['like', 'final_keterangan_nilai', $this->final_keterangan_nilai])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'created_user', $this->created_user])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
