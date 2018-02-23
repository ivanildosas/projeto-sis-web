<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $login
 * @property string $senha
 * @property string $nome
 *
 * @property Anuncio[] $anuncios
 * @property SugestaoPreco[] $sugestaoPrecos
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'login', 'senha', 'nome'], 'required'],
            [['id'], 'integer'],
            [['login'], 'string', 'max' => 20],
            [['senha'], 'string', 'max' => 12],
            [['nome'], 'string', 'max' => 40],
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
            'login' => 'Login',
            'senha' => 'Senha',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnuncios()
    {
        return $this->hasMany(Anuncio::className(), ['id_usuario' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSugestaoPrecos()
    {
        return $this->hasMany(SugestaoPreco::className(), ['id_usuario' => 'id']);
    }
}
