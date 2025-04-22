<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fornecedor".
 *
 * @property int $id
 * @property string $nome
 * @property string $cnpj
 * @property string|null $telefone
 * @property string|null $endereco
 *
 * @property Produto[] $produtos
 */
class Fornecedor extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fornecedor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telefone', 'endereco'], 'default', 'value' => null],
            [['nome', 'cnpj'], 'required'],
            [['nome'], 'string', 'max' => 100],
            [['cnpj'], 'string', 'max' => 18],
            [['telefone'], 'string', 'max' => 15],
            [['endereco'], 'string', 'max' => 255],
            [['cnpj'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'NOME',
            'cnpj' => 'CNPJ',
            'telefone' => 'TELEFONE',
            'endereco' => 'ENDEREÇO',
        ];
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery|ProdutoQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::class, ['id_fornecedor' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return FornecedorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FornecedorQuery(get_called_class());
    }

}
