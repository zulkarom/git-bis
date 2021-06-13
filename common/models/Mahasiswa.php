<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property int $id
 * @property string $nama
 * @property string $no_hp
 * @property string $email
 * @property string $jantina
 * @property string $alamat
 * @property string $kelas
 * @property int $subjek
 * @property string $jenis_pembelajaran
 * @property string $filedoc
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public $uploadFile;
    public function rules()
    {
        return [
            [['nama', 'no_hp', 'email', 'jantina', 'alamat', 'kelas', 'subjek', 'jenis_pembelajaran', 'filedoc'], 'required'],
            [['alamat'], 'string'],
            [['subjek'], 'string'],
            [['nama'], 'string', 'max' => 100],
            [['no_hp'], 'string', 'max' => 12],
            [['email', 'jenis_pembelajaran'], 'string', 'max' => 50],
            [['kelas'], 'string', 'max' => 20],
            [['jantina'], 'string', 'max' => 10],
            [['kelas'], 'string', 'max' => 20],
            [['filedoc'], 'string', 'max' => 500],
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
            'no_hp' => 'No Hp',
            'email' => 'Email',
            'jantina' => 'Jantina',
            'alamat' => 'Alamat',
            'kelas' => 'Kelas',
            'subjek' => 'Subjek',
            'jenis_pembelajaran' => 'Jenis Pembelajaran',
            'filedoc' => 'Filedoc',
        ];
    }
}
