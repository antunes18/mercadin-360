<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string $nome_completo
 * @property string|null $telefone
 * @property string|null $endereco
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telefone', 'endereco'], 'default', 'value' => null],
            [['nome_completo'], 'required'],
            [['nome_completo'], 'string', 'max' => 100],
            [['telefone'], 'string', 'max' => 15],
            [['endereco'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome_completo' => 'Nome Completo',
            'telefone' => 'Telefone',
            'endereco' => 'Endereco',
        ];
    }

}
