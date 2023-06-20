<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "smk_pegawai_tahunan".
 *
 * @property int $id_smk_pegawai_tahunan
 * @property string $type_periode
 * @property int $id_smk_periode
 * @property int $year
 * @property int $id_pegawai
 * @property int|null $id_smk_pegawai_tahunan_parent
 * @property int $rev_no
 * @property int $id_hrm_organization_structure
 * @property int $id_hrm_organization_position
 * @property int $id_pegawai_atasan
 * @property int $id_hrm_organization_position_atasan
 * @property int $id_hrm_kantor
 * @property int $plan_is_changed
 * @property int $planchange_is_approved
 * @property string $planchange_notes
 * @property int|null $plan_is_approved
 * @property string|null $plan_approval_date
 * @property int|null $plan_approval_id_pegawai
 * @property string|null $plan_approval_ip_address
 * @property string|null $plan_approval_notes
 * @property int|null $bimb_is_approved
 * @property string|null $bimb_approval_date
 * @property int|null $bimb_approval_id_pegawai
 * @property string|null $bimb_approval_ip_address
 * @property string|null $bimb_approval_notes
 * @property int|null $is_approved
 * @property string|null $approval_date
 * @property int|null $approval_id_pegawai
 * @property string|null $approval_ip_address
 * @property string|null $approval_notes
 * @property float $nilai_point
 * @property string $nilai_angka
 * @property string $keterangan_nilai
 * @property float $bmb_nilai_point
 * @property string $bmb_nilai_angka
 * @property string $bmb_keterangan_nilai
 * @property float $final_nilai_point
 * @property string $final_nilai_angka
 * @property string $final_keterangan_nilai
 * @property string|null $keterangan
 * @property int $plan_status_completed
 * @property int $bimb_status_completed
 * @property int $final_status_completed
 * @property int $status
 * @property string $filename
 * @property string|null $created_date
 * @property string|null $created_user
 * @property string|null $created_ip_address
 */
class SmkPegawaiTahunan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smk_pegawai_tahunan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_periode', 'id_smk_periode', 'year', 'id_pegawai', 'id_hrm_organization_structure', 'id_hrm_organization_position', 'id_pegawai_atasan', 'id_hrm_organization_position_atasan', 'id_hrm_kantor', 'planchange_is_approved', 'planchange_notes', 'nilai_point', 'nilai_angka', 'keterangan_nilai', 'bmb_nilai_point', 'bmb_nilai_angka', 'bmb_keterangan_nilai', 'final_nilai_point', 'final_nilai_angka', 'final_keterangan_nilai', 'plan_status_completed', 'bimb_status_completed', 'final_status_completed', 'status', 'filename'], 'required'],
            [['type_periode', 'planchange_notes', 'plan_approval_notes', 'bimb_approval_notes', 'approval_notes'], 'string'],
            [['id_smk_periode', 'year', 'id_pegawai', 'id_smk_pegawai_tahunan_parent', 'rev_no', 'id_hrm_organization_structure', 'id_hrm_organization_position', 'id_pegawai_atasan', 'id_hrm_organization_position_atasan', 'id_hrm_kantor', 'plan_is_changed', 'planchange_is_approved', 'plan_is_approved', 'plan_approval_id_pegawai', 'bimb_is_approved', 'bimb_approval_id_pegawai', 'is_approved', 'approval_id_pegawai', 'plan_status_completed', 'bimb_status_completed', 'final_status_completed', 'status'], 'integer'],
            [['plan_approval_date', 'bimb_approval_date', 'approval_date', 'created_date'], 'safe'],
            [['nilai_point', 'bmb_nilai_point', 'final_nilai_point'], 'number'],
            [['plan_approval_ip_address', 'bimb_approval_ip_address', 'approval_ip_address', 'created_user', 'created_ip_address'], 'string', 'max' => 64],
            [['nilai_angka', 'bmb_nilai_angka', 'final_nilai_angka'], 'string', 'max' => 20],
            [['keterangan_nilai', 'bmb_keterangan_nilai', 'final_keterangan_nilai'], 'string', 'max' => 200],
            [['keterangan', 'filename'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_smk_pegawai_tahunan' => 'Id Smk Pegawai Tahunan',
            'type_periode' => 'Type Periode',
            'id_smk_periode' => 'Id Smk Periode',
            'year' => 'Year',
            'id_pegawai' => 'Id Pegawai',
            'id_smk_pegawai_tahunan_parent' => 'Id Smk Pegawai Tahunan Parent',
            'rev_no' => 'Rev No',
            'id_hrm_organization_structure' => 'Id Hrm Organization Structure',
            'id_hrm_organization_position' => 'Id Hrm Organization Position',
            'id_pegawai_atasan' => 'Id Pegawai Atasan',
            'id_hrm_organization_position_atasan' => 'Id Hrm Organization Position Atasan',
            'id_hrm_kantor' => 'Id Hrm Kantor',
            'plan_is_changed' => 'Plan Is Changed',
            'planchange_is_approved' => 'Planchange Is Approved',
            'planchange_notes' => 'Planchange Notes',
            'plan_is_approved' => 'Plan Is Approved',
            'plan_approval_date' => 'Plan Approval Date',
            'plan_approval_id_pegawai' => 'Plan Approval Id Pegawai',
            'plan_approval_ip_address' => 'Plan Approval Ip Address',
            'plan_approval_notes' => 'Plan Approval Notes',
            'bimb_is_approved' => 'Bimb Is Approved',
            'bimb_approval_date' => 'Bimb Approval Date',
            'bimb_approval_id_pegawai' => 'Bimb Approval Id Pegawai',
            'bimb_approval_ip_address' => 'Bimb Approval Ip Address',
            'bimb_approval_notes' => 'Bimb Approval Notes',
            'is_approved' => 'Is Approved',
            'approval_date' => 'Approval Date',
            'approval_id_pegawai' => 'Approval Id Pegawai',
            'approval_ip_address' => 'Approval Ip Address',
            'approval_notes' => 'Approval Notes',
            'nilai_point' => 'Nilai Point',
            'nilai_angka' => 'Nilai Angka',
            'keterangan_nilai' => 'Keterangan Nilai',
            'bmb_nilai_point' => 'Bmb Nilai Point',
            'bmb_nilai_angka' => 'Bmb Nilai Angka',
            'bmb_keterangan_nilai' => 'Bmb Keterangan Nilai',
            'final_nilai_point' => 'Final Nilai Point',
            'final_nilai_angka' => 'Final Nilai Angka',
            'final_keterangan_nilai' => 'Final Keterangan Nilai',
            'keterangan' => 'Keterangan',
            'plan_status_completed' => 'Plan Status Completed',
            'bimb_status_completed' => 'Bimb Status Completed',
            'final_status_completed' => 'Final Status Completed',
            'status' => 'Status',
            'filename' => 'Filename',
            'created_date' => 'Created Date',
            'created_user' => 'Created User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
