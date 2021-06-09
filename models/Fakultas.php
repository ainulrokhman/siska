<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "fakultas".
 *
 * @property int $fakultas_id
 * @property string|null $kode
 * @property string|null $nama
 */
class Fakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fakultas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
            'fakultas_id' => 'Fakultas ID',
            'kode' => 'Kode',
            'nama' => 'Nama',
        ];
    }

    public static function dropdownList()
    {
        $query = new Query;

        $query->from('fakultas');
        $query->orderBy([
            'nama' => SORT_ASC,
        ]);

        $list = $query->all();

        return ArrayHelper::map($list, 'fakultas_id', 'nama');
    }
}
