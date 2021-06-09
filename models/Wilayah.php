<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "wilayah".
 *
 * @property string $kode
 * @property string|null $nama
 */
class Wilayah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wilayah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode'], 'required'],
            [['kode'], 'string', 'max' => 13],
            [['nama'], 'string', 'max' => 100],
            [['kode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'nama' => 'Nama',
        ];
    }

    public static function provinsiList()
    {
        $query = new Query;

        $query->from('wilayah');
        $query->where('CHAR_LENGTH(kode)=2');
        $query->orderBy([
            'nama' => SORT_ASC,
        ]);
        $list = $query->all();

        return ArrayHelper::map($list, 'kode', 'nama');
    }

    public static function kabupatenList($id)
    {
        $query = new Query;

        $query->from('wilayah');
        $query->where('CHAR_LENGTH(kode) = 5 AND kode LIKE "'.$id.'.__"');
        $query->orderBy([
            'nama' => SORT_ASC,
        ]);
        $list = $query->all();

        return $list;
    }

    public static function kecamatanList($id)
    {
        $query = new Query;

        $query->from('wilayah');
        $query->where('CHAR_LENGTH(kode) = 8 AND kode LIKE "'.$id.'.__"');
        $query->orderBy([
            'nama' => SORT_ASC,
        ]);
        $list = $query->all();

        return $list;
    }

    public static function kelurahanList($id)
    {
        $query = new Query;

        $query->from('wilayah');
        $query->where('CHAR_LENGTH(kode) = 13 AND kode LIKE "'.$id.'.____"');
        $query->orderBy([
            'nama' => SORT_ASC,
        ]);
        $list = $query->all();

        return $list;
    }

    public static function FunctionName()
    {
        # code...
    }
}
