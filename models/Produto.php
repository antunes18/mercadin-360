<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $id
 * @property string $nome
 * @property string|null $descricao
 * @property float $preco
 * @property int|null $id_fornecedor
 *
 * @property Estoque[] $estoques
 * @property Fornecedor $fornecedor
 * @property ItemVenda[] $itemVendas
 */
class Produto extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'id_fornecedor'], 'default', 'value' => null],
            [['nome', 'preco'], 'required'],
            [['descricao'], 'string'],
            [['preco'], 'number'],
            [['id_fornecedor'], 'integer'],
            [['nome'], 'string', 'max' => 100],
            [['id_fornecedor'], 'exist', 'skipOnError' => true, 'targetClass' => Fornecedor::class, 'targetAttribute' => ['id_fornecedor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'preco' => 'Preco',
            'id_fornecedor' => 'Id Fornecedor',
        ];
    }

    /**
     * Gets query for [[Estoques]].
     *
     * @return \yii\db\ActiveQuery|EstoqueQuery
     */
    public function getEstoques()
    {
        return $this->hasMany(Estoque::class, ['id_produto' => 'id']);
    }

    /**
     * Gets query for [[Fornecedor]].
     *
     * @return \yii\db\ActiveQuery|FornecedorQuery
     */
    public function getFornecedor()
    {
        return $this->hasOne(Fornecedor::class, ['id' => 'id_fornecedor']);
    }

    /**
     * Gets query for [[ItemVendas]].
     *
     * @return \yii\db\ActiveQuery|ItemVendaQuery
     */
    public function getItemVendas()
    {
        return $this->hasMany(ItemVenda::class, ['id_produto' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProdutoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProdutoQuery(get_called_class());
    }

}
