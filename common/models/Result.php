<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "result".
 *
 * @property int $result_id
 * @property string $jenis_result
 * @property string $tahun_result
 */
class Result extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_result', 'tahun_result'], 'required'],
            [['jenis_result'], 'string', 'max' => 50],
            [['tahun_result'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Result ID',
            'jenis_result' => 'Jenis Result',
            'tahun_result' => 'Tahun Result',
        ];
    }
	
	public function getMataPelajarans()
    {
        return $this->hasMany(MataPelajaran::className(), ['result_id' => 'id']);
    }

}
