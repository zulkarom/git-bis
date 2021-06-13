<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mata_pelajaran".
 *
 * @property int $id_pelajaran
 * @property int $result_id
 * @property string $psubjek
 * @property string $gred
 */
class MataPelajaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mata_pelajaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['psubjek', 'gred'], 'required'],
            [['result_id'], 'integer'],
            [['psubjek'], 'string', 'max' => 50],
            [['gred'], 'string', 'max' => 5],
            //[['result_id'], 'exist', 'skipOnError' => true, 'targetClass' => Result::className(), 'targetAttribute' => ['result_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id Pelajaran',
            'result_id' => 'Result ID',
            'psubjek' => 'Psubjek',
            'gred' => 'Gred',
        ];
    }
}
