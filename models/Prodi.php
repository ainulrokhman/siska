<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "prodi".
 *
 * @property int $prodi_id
 * @property string|null $kode
 * @property string|null $nama
 * @property int $fakultas_id
 */
class Prodi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prodi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fakultas_id'], 'required'],
            [['fakultas_id'], 'integer'],
            [['kode'], 'string', 'max' => 10],
            [['nama'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prodi_id' => 'Prodi ID',
            'kode' => 'Kode',
            'nama' => 'Nama',
            'fakultas_id' => 'Fakultas',
        ];
    }

    public function getFakultas()
    {
        return $this->hasOne(Fakultas::class, ['fakultas_id' => 'fakultas_id']);
    }

    public static function dropdownList()
    {
        $query = new Query();

        $query->from('prodi');
        $query->orderBy([
            'nama' => SORT_ASC,
        ]);

        $list = $query->all();

        return ArrayHelper::map($list, 'prodi_id', 'nama');

    }
}
