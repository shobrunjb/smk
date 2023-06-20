<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id_project
 * @property int $id_perusahaan
 * @property int $id_project_mst_type
 * @property string|null $kode_proyek
 * @property string $nama_proyek
 * @property string|null $description
 * @property int $is_active
 * @property int $backlog_is_locked
 * @property string|null $repo_code
 * @property string|null $repo1
 * @property string|null $repo2
 * @property string|null $repo3
 * @property string|null $repo4
 * @property string|null $repo5
 * @property string|null $repo6
 * @property string|null $plan_start_date
 * @property string|null $plan_end_date
 * @property string|null $actual_start_date
 * @property string|null $actual_end_date
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_perusahaan', 'id_project_mst_type', 'nama_proyek', 'is_active'], 'required'],
            [['id_perusahaan', 'id_project_mst_type', 'is_active', 'backlog_is_locked', 'created_id_user'], 'integer'],
            [['description'], 'string'],
            [['plan_start_date', 'plan_end_date', 'actual_start_date', 'actual_end_date', 'created_date'], 'safe'],
            [['kode_proyek'], 'string', 'max' => 60],
            [['nama_proyek'], 'string', 'max' => 170],
            [['repo_code', 'repo1', 'repo2', 'repo3', 'repo4', 'repo5', 'repo6'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_project' => 'Id Project',
            'id_perusahaan' => 'Id Perusahaan',
            'id_project_mst_type' => 'Id Project Mst Type',
            'kode_proyek' => 'Kode Proyek',
            'nama_proyek' => 'Nama Proyek',
            'description' => 'Description',
            'is_active' => 'Is Active',
            'backlog_is_locked' => 'Backlog Is Locked',
            'repo_code' => 'Repository Github/Gitlab',
            'repo1' => 'Repo 1',
            'repo2' => 'Repo 2',
            'repo3' => 'Repo 3',
            'repo4' => 'Repo 4',
            'repo5' => 'Repo 5',
            'repo6' => 'Repo 6',
            'plan_start_date' => 'Tgl. Mulai',
            'plan_end_date' => 'Tgl. Berakhir',
            'actual_start_date' => 'Actual Start Date',
            'actual_end_date' => 'Actual End Date',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
