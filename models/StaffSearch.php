<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Staff;

/**
 * StaffSearch represents the model behind the search form of `app\models\Staff`.
 */
class StaffSearch extends Staff
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'jenis_kelamin_id', 'pendidikan_id', 'user_id'], 'integer'],
            [['nip', 'nama_lengkap', 'alamat', 'provinsi_id', 'kabupaten_id', 'kecamatan_id', 'kelurahan_id', 'no_hp', 'tmp_lahir', 'tgl_lahir', 'jabatan_id', 'tgl_bergabung'], 'safe'],
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
        $query = Staff::find();

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
            'id' => $this->id,
            'jenis_kelamin_id' => $this->jenis_kelamin_id,
            'tgl_lahir' => $this->tgl_lahir,
            'pendidikan_id' => $this->pendidikan_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'nip', $this->nip])
            ->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'provinsi_id', $this->provinsi_id])
            ->andFilterWhere(['like', 'kabupaten_id', $this->kabupaten_id])
            ->andFilterWhere(['like', 'kecamatan_id', $this->kecamatan_id])
            ->andFilterWhere(['like', 'kelurahan_id', $this->kelurahan_id])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'tmp_lahir', $this->tmp_lahir])
            ->andFilterWhere(['like', 'jabatan_id', $this->jabatan_id])
            ->andFilterWhere(['like', 'tgl_bergabung', $this->tgl_bergabung]);

        return $dataProvider;
    }
}
