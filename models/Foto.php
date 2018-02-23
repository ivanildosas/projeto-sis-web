<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "foto".
 *
 * @property int $id
 * @property int $id_veiculo
 * @property string $imagem
 *
 * @property Veiculo $veiculo
 */
class Foto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'foto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_veiculo', 'imagem'], 'required'],
            [['id', 'id_veiculo'], 'integer'],
            [['imagem'], 'string', 'max' => 40],
            [['id'], 'unique'],
            [['id_veiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Veiculo::className(), 'targetAttribute' => ['id_veiculo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_veiculo' => 'Id Veiculo',
            'imagem' => 'Imagem',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVeiculo()
    {
        return $this->hasOne(Veiculo::className(), ['id' => 'id_veiculo']);
    }
}
