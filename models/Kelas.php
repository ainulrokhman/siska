<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelas".
 *
 * @property int $id
 * @property int $mata_kuliah_id
 * @property string|null $jam_mulai
 * @property string|null $jam_selesai
 * @property int $ruang_id
 */
class Kelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mata_kuliah_id', 'ruang_id'], 'required'],
            [['mata_kuliah_id', 'ruang_id'], 'integer'],
            [['jam_mulai', 'jam_selesai'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mata_kuliah_id' => 'Mata Kuliah ID',
            'jam_mulai' => 'Jam Mulai',
            'jam_selesai' => 'Jam Selesai',
            'ruang_id' => 'Ruang ID',
        ];
    }

    public function getRuang()
    {
        return $this->hasOne(Ruang::class, ['id' => 'ruang_id']);
    }

    public function getMakul()
    {
        return $this->hasOne(MataKuliah::class, ['id' => 'mata_kuliah_id']);
    }
}
