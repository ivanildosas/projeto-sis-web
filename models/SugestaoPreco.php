<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sugestao_preco".
 *
 * @property int $id
 * @property int $id_usuario
 * @property int $id_anuncio
 * @property int $valor
 * @property string $comentario
 * @property string $dt_sugestao
 *
 * @property Usuario $usuario
 * @property Anuncio $anuncio
 */
class SugestaoPreco extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sugestao_preco';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_usuario', 'id_anuncio', 'valor', 'dt_sugestao'], 'required'],
            [['id', 'id_usuario', 'id_anuncio', 'valor'], 'integer'],
            [['dt_sugestao'], 'safe'],
            [['comentario'], 'string', 'max' => 240],
            [['id'], 'unique'],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario' => 'id']],
            [['id_anuncio'], 'exist', 'skipOnError' => true, 'targetClass' => Anuncio::className(), 'targetAttribute' => ['id_anuncio' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_usuario' => 'Id Usuario',
            'id_anuncio' => 'Id Anuncio',
            'valor' => 'Valor',
            'comentario' => 'Comentario',
            'dt_sugestao' => 'Dt Sugestao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnuncio()
    {
        return $this->hasOne(Anuncio::className(), ['id' => 'id_anuncio']);
    }
}
