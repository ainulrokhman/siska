<?php

namespace app\models;

use DateTime;
use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $id
 * @property string|null $nip
 * @property string|null $nama_lengkap
 * @property string|null $alamat
 * @property string|null $provinsi_id
 * @property string|null $kabupaten_id
 * @property string|null $kecamatan_id
 * @property string|null $kelurahan_id
 * @property string|null $no_hp
 * @property int|null $jenis_kelamin_id
 * @property string|null $tmp_lahir
 * @property string|null $tgl_lahir
 * @property int|null $pendidikan_id
 * @property string|null $jabatan_id
 * @property string|null $tgl_bergabung
 * @property string|null $foto_path
 * @property int $user_id
 */
class Staff extends \yii\db\ActiveRecord
{
    public $foto;
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_kelamin_id', 'pendidikan_id', 'user_id'], 'integer'],
            [['tgl_lahir'], 'safe'],
            [['user_id'], 'required'],
            [['nip'], 'string', 'max' => 10],
            [['nama_lengkap', 'provinsi_id', 'kabupaten_id', 'kecamatan_id', 'kelurahan_id'], 'string', 'max' => 50],
            [['alamat'], 'string', 'max' => 100],
            [['no_hp'], 'string', 'max' => 15],
            [['tmp_lahir'], 'string', 'max' => 30],
            [['jabatan_id', 'tgl_bergabung'], 'string', 'max' => 45],
            [['foto_path'], 'string', 'max' => 255],

            // gambar
            [
                ['foto'],
                'image',
                'extensions' => 'img, jpg, jpeg, png',
                'maxSize' => 1024*1024,
                'message' => '{attribute} berukuran lebih dari 1 Mb, mohon dikecilkan lagi.'
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nip' => 'Nip',
            'nama_lengkap' => 'Nama Lengkap',
            'alamat' => 'Alamat',
            'provinsi_id' => 'Provinsi',
            'kabupaten_id' => 'Kabupaten',
            'kecamatan_id' => 'Kecamatan',
            'kelurahan_id' => 'Kelurahan',
            'no_hp' => 'No Hp',
            'jenis_kelamin_id' => 'Jenis Kelamin',
            'tmp_lahir' => 'Tmp Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'pendidikan_id' => 'Pendidikan',
            'jabatan_id' => 'Jabatan',
            'tgl_bergabung' => 'Tgl Bergabung',
            'foto_path' => 'Pas Foto',
            'user_id' => 'User ID',
        ];
    }
    
    public function getProvinsi()
    {
        return $this->hasOne(Wilayah::class, ['kode' => 'provinsi_id']);
    }
    
    public function getKabupaten()
    {
        return $this->hasOne(Wilayah::class, ['kode' => 'kabupaten_id']);
    }
    
    public function getKecamatan()
    {
        return $this->hasOne(Wilayah::class, ['kode' => 'kecamatan_id']);
    }
    
    public function getKelurahan()
    {
        return $this->hasOne(Wilayah::class, ['kode' => 'kelurahan_id']);
    }

    public function getJk()
    {
        return $this->hasOne(LookUp::class, ['id' => 'jenis_kelamin_id']);
    }

    public function getPendidikan()
    {
        return $this->hasOne(LookUp::class, ['id' => 'pendidikan_id']);
    }

    public function getJabatan()
    {
        return $this->hasOne(LookUp::class, ['id' => 'jabatan_id']);
    }

    public function getUmur()
    {
        $lahir = new DateTime(date('Y-m-d', strtotime($this->tgl_lahir)));

        return $lahir->diff(new DateTime())->y;
    }
}
