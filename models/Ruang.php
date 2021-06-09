<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ruang".
 *
 * @property int $id
 * @property string|null $nama
 * @property int|null $kapasitas
 * @property string|null $gedung_id
 */
class Ruang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ruang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kapasitas'], 'integer'],
            [['nama'], 'string', 'max' => 30],
            [['gedung_id'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'kapasitas' => 'Kapasitas',
            'gedung_id' => 'Gedung ID',
        ];
    }

    public static function dropdownList()
    {
        $query = new Query();

        $query->from('ruang');
        $query->orderBy([
            'nama' => SORT_ASC,
        ]);

        $list = $query->all();

        return ArrayHelper::map($list, 'id', 'nama');
    }
}
