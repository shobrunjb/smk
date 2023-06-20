<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SmkAspekRencana;

/**
 * SmkAspekRencanaSearch represents the model behind the search form of `backend\models\SmkAspekRencana`.
 */
class SmkAspekRencanaSearch extends SmkAspekRencana
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_smk_aspek_rencana', 'tahun', 'id_smk_periode', 'id_smk_jenis_penilaian','id_smk_sasaran_position', 'no', 'rev', 'id_smk_mst_jenis_penilaian', 'id_aspek_penilaian', 'plan_id_smk_mst_jenis_penilaian', 'plan_id_aspek_penilaian'], 'integer'],
            [['type', 'sasaran', 'plan_sasaran', 'rev_pre_sasaran', 'target', 'ukuran_pencapaian', 'plan_target', 'plan_ukuran_pencapaian', 'plan_a_rentang_1_i', 'plan_a_rentang_1_ii', 'plan_a_rentang_2_i', 'plan_a_rentang_2_ii', 'plan_b_rentang_1_i', 'plan_b_rentang_1_ii', 'plan_b_rentang_2_i', 'plan_b_rentang_2_ii', 'plan_c_rentang_1_i', 'plan_c_rentang_1_ii', 'plan_c_rentang_2_i', 'plan_c_rentang_2_ii', 'plan_d_rentang_1_i', 'plan_d_rentang_1_ii', 'plan_d_rentang_2_i', 'plan_d_rentang_2_ii', 'plan_e_rentang_1_i', 'plan_e_rentang_1_ii', 'plan_e_rentang_2_i', 'plan_e_rentang_2_ii', 'plan_f_rentang_1_i', 'plan_f_rentang_1_ii', 'plan_f_rentang_2_i', 'plan_f_rentang_2_ii'], 'safe'],
            [['sub_bobot', 'plan_sub_bobot', 'bc_sub_bobot'], 'number'],
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
        $query = SmkAspekRencana::find();

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
            'id_smk_aspek_rencana' => $this->id_smk_aspek_rencana,
            'tahun' => $this->tahun,
            'id_smk_periode' => $this->id_smk_periode,
            'id_smk_sasaran_position' => $this->id_smk_sasaran_position,
            'no' => $this->no,
            'rev' => $this->rev,
            'id_smk_mst_jenis_penilaian' => $this->id_smk_mst_jenis_penilaian,
            'id_smk_jenis_penilaian' => $this->id_smk_jenis_penilaian,
            'id_aspek_penilaian' => $this->id_aspek_penilaian,
            'sub_bobot' => $this->sub_bobot,
            'plan_id_smk_mst_jenis_penilaian' => $this->plan_id_smk_mst_jenis_penilaian,
            'plan_id_aspek_penilaian' => $this->plan_id_aspek_penilaian,
            'plan_sub_bobot' => $this->plan_sub_bobot,
            'bc_sub_bobot' => $this->bc_sub_bobot,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'sasaran', $this->sasaran])
            ->andFilterWhere(['like', 'plan_sasaran', $this->plan_sasaran])
            ->andFilterWhere(['like', 'rev_pre_sasaran', $this->rev_pre_sasaran])
            ->andFilterWhere(['like', 'target', $this->target])
            ->andFilterWhere(['like', 'ukuran_pencapaian', $this->ukuran_pencapaian])
            ->andFilterWhere(['like', 'plan_target', $this->plan_target])
            ->andFilterWhere(['like', 'plan_ukuran_pencapaian', $this->plan_ukuran_pencapaian])
            ->andFilterWhere(['like', 'plan_a_rentang_1_i', $this->plan_a_rentang_1_i])
            ->andFilterWhere(['like', 'plan_a_rentang_1_ii', $this->plan_a_rentang_1_ii])
            ->andFilterWhere(['like', 'plan_a_rentang_2_i', $this->plan_a_rentang_2_i])
            ->andFilterWhere(['like', 'plan_a_rentang_2_ii', $this->plan_a_rentang_2_ii])
            ->andFilterWhere(['like', 'plan_b_rentang_1_i', $this->plan_b_rentang_1_i])
            ->andFilterWhere(['like', 'plan_b_rentang_1_ii', $this->plan_b_rentang_1_ii])
            ->andFilterWhere(['like', 'plan_b_rentang_2_i', $this->plan_b_rentang_2_i])
            ->andFilterWhere(['like', 'plan_b_rentang_2_ii', $this->plan_b_rentang_2_ii])
            ->andFilterWhere(['like', 'plan_c_rentang_1_i', $this->plan_c_rentang_1_i])
            ->andFilterWhere(['like', 'plan_c_rentang_1_ii', $this->plan_c_rentang_1_ii])
            ->andFilterWhere(['like', 'plan_c_rentang_2_i', $this->plan_c_rentang_2_i])
            ->andFilterWhere(['like', 'plan_c_rentang_2_ii', $this->plan_c_rentang_2_ii])
            ->andFilterWhere(['like', 'plan_d_rentang_1_i', $this->plan_d_rentang_1_i])
            ->andFilterWhere(['like', 'plan_d_rentang_1_ii', $this->plan_d_rentang_1_ii])
            ->andFilterWhere(['like', 'plan_d_rentang_2_i', $this->plan_d_rentang_2_i])
            ->andFilterWhere(['like', 'plan_d_rentang_2_ii', $this->plan_d_rentang_2_ii])
            ->andFilterWhere(['like', 'plan_e_rentang_1_i', $this->plan_e_rentang_1_i])
            ->andFilterWhere(['like', 'plan_e_rentang_1_ii', $this->plan_e_rentang_1_ii])
            ->andFilterWhere(['like', 'plan_e_rentang_2_i', $this->plan_e_rentang_2_i])
            ->andFilterWhere(['like', 'plan_e_rentang_2_ii', $this->plan_e_rentang_2_ii])
            ->andFilterWhere(['like', 'plan_f_rentang_1_i', $this->plan_f_rentang_1_i])
            ->andFilterWhere(['like', 'plan_f_rentang_1_ii', $this->plan_f_rentang_1_ii])
            ->andFilterWhere(['like', 'plan_f_rentang_2_i', $this->plan_f_rentang_2_i])
            ->andFilterWhere(['like', 'plan_f_rentang_2_ii', $this->plan_f_rentang_2_ii]);

        return $dataProvider;
    }
}
