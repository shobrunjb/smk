<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bei_kar_asses_jawaban".
 *
 * @property string $id_bei_kar_asses_jawaban
 * @property int $id_kompetensi_dasar
 * @property string $id_bei_compentecy_question
 * @property string $id_hrm_competency_dimension
 * @property string $id_bei_interview_session
 * @property string $id_pegawai
 * @property string $soal
 * @property string $jawaban
 * @property string $score_by_machine
 * @property string $score_by_asesor
 * @property string $key_verb
 * @property string $key_time
 * @property string $key_location
 * @property string $r_st
 * @property string $r_ar
 * @property string $modified_time
 * @property string $modified_user
 * @property string $modified_ip_address
 */
class BeiKarAssesJawaban extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bei_kar_asses_jawaban';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kompetensi_dasar', 'id_bei_compentecy_question', 'id_hrm_competency_dimension', 'id_bei_interview_session', 'id_pegawai', 'score_by_machine', 'r_ar', 'modified_time', 'modified_user', 'modified_ip_address'], 'required'],
            [['id_kompetensi_dasar', 'id_bei_compentecy_question', 'id_hrm_competency_dimension', 'id_bei_interview_session', 'id_pegawai'], 'integer'],
            [['jawaban'], 'string'],
            [['score_by_machine', 'score_by_asesor'], 'number'],
            [['modified_time'], 'safe'],
            [['soal', 'key_verb', 'key_time', 'key_location', 'r_st', 'r_ar'], 'string', 'max' => 1000],
            [['modified_user', 'modified_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bei_kar_asses_jawaban' => 'Id Bei Kar Asses Jawaban',
            'id_kompetensi_dasar' => 'Kompetensi Dasar',
            'id_bei_compentecy_question' => 'Bei Compentecy Question',
            'id_hrm_competency_dimension' => 'Hrm Competency Dimension',
            'id_bei_interview_session' => 'Interview Session',
            'id_pegawai' => 'Pegawai',
            'soal' => 'Soal',
            'jawaban' => 'Jawaban',
            'score_by_machine' => 'Score By Machine',
            'score_by_asesor' => 'Score By Asesor',
            'key_verb' => 'Key Verb',
            'key_time' => 'Key Time',
            'key_location' => 'Key Location',
            'r_st' => 'R St',
            'r_ar' => 'R Ar',
            'modified_time' => 'Modified Time',
            'modified_user' => 'Modified User',
            'modified_ip_address' => 'Modified Ip Address',
        ];
    }



    public function getQuestion()
    {
        return $this->hasOne(BeiCompentecyQuestion::className(), ['id_bei_compentecy_question' => 'id_bei_compentecy_question']);
    }

    public function getComDimension()
    {
        return $this->hasOne(HrmCompetencyDimension::className(), ['id_hrm_competency_dimension' => 'id_hrm_competency_dimension']);
    }

    public function getViewSession()
    {
        return $this->hasOne(BeiInterviewSession::className(), ['id_bei_interview_session' => 'id_bei_interview_session']);
    }

    public function getPegawai()
    {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }
}
