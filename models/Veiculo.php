<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "veiculo".
 *
 * @property int $id
 * @property string $marca
 * @property string $modelo
 * @property string $versao
 * @property string $motor
 * @property string $ano
 * @property string $km
 *
 * @property Anuncio[] $anuncios
 * @property Foto[] $fotos
 */
class Veiculo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'veiculo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marca', 'modelo', 'motor', 'ano', 'km'], 'required'],
            [['id'], 'integer'],
            [['marca', 'modelo', 'versao', 'ano', 'km'], 'string', 'max' => 20],
            [['motor'], 'string', 'max' => 6],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'versao' => 'Versao',
            'motor' => 'Motor',
            'ano' => 'Ano',
            'km' => 'Km',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnuncios()
    {
        return $this->hasMany(Anuncio::className(), ['id_veiculo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFotos()
    {
        return $this->hasMany(Foto::className(), ['id_veiculo' => 'id']);
    }
}
