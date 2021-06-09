<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "mata_kuliah".
 *
 * @property int $id
 * @property string|null $kode
 * @property int|null $jenis
 * @property string|null $nama
 * @property string|null $fak_prodi_id
 */
class MataKuliah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mata_kuliah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis'], 'integer'],
            [['kode', 'nama', 'fak_prodi_id'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'jenis' => 'Jenis',
            'nama' => 'Nama',
            'fak_prodi_id' => 'Prodi',
        ];
    }    

    public static function dropdownList()
    {
        $query = new Query();

        $query->from('mata_kuliah');
        $query->orderBy([
            'nama' => SORT_ASC,
        ]);

        $list = $query->all();

        return ArrayHelper::map($list, 'id', 'nama');

    }

    public function getProdi()
    {
        return $this->hasOne(Prodi::class, ['prodi_id' => 'fak_prodi_id']);
    }
}
