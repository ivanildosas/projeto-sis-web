<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anuncio".
 *
 * @property int $id
 * @property int $id_usuario
 * @property int $id_veiculo
 * @property string $cidade
 * @property string $estado
 * @property string $descricao
 * @property string $dt_criacao
 *
 * @property Usuario $usuario
 * @property Veiculo $veiculo
 * @property SugestaoPreco[] $sugestaoPrecos
 */
class Anuncio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anuncio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_usuario', 'id_veiculo', 'cidade', 'estado', 'dt_criacao'], 'required'],
            [['id', 'id_usuario', 'id_veiculo'], 'integer'],
            [['dt_criacao'], 'safe'],
            [['cidade'], 'string', 'max' => 40],
            [['estado'], 'string', 'max' => 20],
            [['descricao'], 'string', 'max' => 240],
            [['id'], 'unique'],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario' => 'id']],
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
            'id_usuario' => 'Id Usuario',
            'id_veiculo' => 'Id Veiculo',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'descricao' => 'Descricao',
            'dt_criacao' => 'Dt Criacao',
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
    public function getVeiculo()
    {
        return $this->hasOne(Veiculo::className(), ['id' => 'id_veiculo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSugestaoPrecos()
    {
        return $this->hasMany(SugestaoPreco::className(), ['id_anuncio' => 'id']);
    }
}
