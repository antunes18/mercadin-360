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
 * @property string $categoria
 * @property string|null $marca
 *
 * @property Estoque[] $estoques
 * @property Fornecedor $fornecedor
 * @property ItemVenda[] $itemVendas
 */
class Produto extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const CATEGORIA_HORTIFRUTI = 'Hortifruti';
    const CATEGORIA_ACOUGUE = 'Açougue';
    const CATEGORIA_MERCEARIA = 'Mercearia';
    const CATEGORIA_FRIOS_E_LATICINIOS = 'Frios e Laticínios';
    const CATEGORIA_BEBIDAS_ALCOOLICAS = 'Bebidas Alcoólicas';
    const CATEGORIA_BEBIDAS_NAO_ALCOOLICAS = 'Bebidas Não Alcoólicas';
    const CATEGORIA_LIMPEZA = 'Limpeza';
    const CATEGORIA_HIGIENE_PESSOAL = 'Higiene Pessoal';
    const CATEGORIA_PAPELARIA = 'Papelaria';
    const CATEGORIA_PADARIA = 'Padaria';
    const CATEGORIA_CONGELADOS = 'Congelados';

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
            [['descricao', 'id_fornecedor', 'marca'], 'default', 'value' => null],
            [['nome', 'preco', 'categoria'], 'required'],
            [['descricao', 'categoria'], 'string'],
            [['preco'], 'number'],
            [['id_fornecedor'], 'integer'],
            [['nome'], 'string', 'max' => 100],
            [['marca'], 'string', 'max' => 50],
            ['categoria', 'in', 'range' => array_keys(self::optsCategoria())],
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
            'preco' => 'Preço',
            'id_fornecedor' => 'Id Fornecedor',
            'categoria' => 'Categoria',
            'marca' => 'Marca',
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


    /**
     * column categoria ENUM value labels
     * @return string[]
     */
    public static function optsCategoria()
    {
        return [
            self::CATEGORIA_HORTIFRUTI => 'Hortifruti',
            self::CATEGORIA_ACOUGUE => 'Açougue',
            self::CATEGORIA_MERCEARIA => 'Mercearia',
            self::CATEGORIA_FRIOS_E_LATICINIOS => 'Frios e Laticínios',
            self::CATEGORIA_BEBIDAS_ALCOOLICAS => 'Bebidas Alcoólicas',
            self::CATEGORIA_BEBIDAS_NAO_ALCOOLICAS => 'Bebidas Não Alcoólicas',
            self::CATEGORIA_LIMPEZA => 'Limpeza',
            self::CATEGORIA_HIGIENE_PESSOAL => 'Higiene Pessoal',
            self::CATEGORIA_PAPELARIA => 'Papelaria',
            self::CATEGORIA_PADARIA => 'Padaria',
            self::CATEGORIA_CONGELADOS => 'Congelados',
        ];
    }

    /**
     * @return string
     */
    public function displayCategoria()
    {
        return self::optsCategoria()[$this->categoria];
    }

    /**
     * @return bool
     */
    public function isCategoriaHortifruti()
    {
        return $this->categoria === self::CATEGORIA_HORTIFRUTI;
    }

    public function setCategoriaToHortifruti()
    {
        $this->categoria = self::CATEGORIA_HORTIFRUTI;
    }

    /**
     * @return bool
     */
    public function isCategoriaAcougue()
    {
        return $this->categoria === self::CATEGORIA_ACOUGUE;
    }

    public function setCategoriaToAcougue()
    {
        $this->categoria = self::CATEGORIA_ACOUGUE;
    }

    /**
     * @return bool
     */
    public function isCategoriaMercearia()
    {
        return $this->categoria === self::CATEGORIA_MERCEARIA;
    }

    public function setCategoriaToMercearia()
    {
        $this->categoria = self::CATEGORIA_MERCEARIA;
    }

    /**
     * @return bool
     */
    public function isCategoriaFriosELaticinios()
    {
        return $this->categoria === self::CATEGORIA_FRIOS_E_LATICINIOS;
    }

    public function setCategoriaToFriosELaticinios()
    {
        $this->categoria = self::CATEGORIA_FRIOS_E_LATICINIOS;
    }

    /**
     * @return bool
     */
    public function isCategoriaBebidasAlcoolicas()
    {
        return $this->categoria === self::CATEGORIA_BEBIDAS_ALCOOLICAS;
    }

    public function setCategoriaToBebidasAlcoolicas()
    {
        $this->categoria = self::CATEGORIA_BEBIDAS_ALCOOLICAS;
    }

    /**
     * @return bool
     */
    public function isCategoriaBebidasNaoAlcoolicas()
    {
        return $this->categoria === self::CATEGORIA_BEBIDAS_NAO_ALCOOLICAS;
    }

    public function setCategoriaToBebidasNaoAlcoolicas()
    {
        $this->categoria = self::CATEGORIA_BEBIDAS_NAO_ALCOOLICAS;
    }

    /**
     * @return bool
     */
    public function isCategoriaLimpeza()
    {
        return $this->categoria === self::CATEGORIA_LIMPEZA;
    }

    public function setCategoriaToLimpeza()
    {
        $this->categoria = self::CATEGORIA_LIMPEZA;
    }

    /**
     * @return bool
     */
    public function isCategoriaHigienePessoal()
    {
        return $this->categoria === self::CATEGORIA_HIGIENE_PESSOAL;
    }

    public function setCategoriaToHigienePessoal()
    {
        $this->categoria = self::CATEGORIA_HIGIENE_PESSOAL;
    }

    /**
     * @return bool
     */
    public function isCategoriaPapelaria()
    {
        return $this->categoria === self::CATEGORIA_PAPELARIA;
    }

    public function setCategoriaToPapelaria()
    {
        $this->categoria = self::CATEGORIA_PAPELARIA;
    }

    /**
     * @return bool
     */
    public function isCategoriaPadaria()
    {
        return $this->categoria === self::CATEGORIA_PADARIA;
    }

    public function setCategoriaToPadaria()
    {
        $this->categoria = self::CATEGORIA_PADARIA;
    }

    /**
     * @return bool
     */
    public function isCategoriaCongelados()
    {
        return $this->categoria === self::CATEGORIA_CONGELADOS;
    }

    public function setCategoriaToCongelados()
    {
        $this->categoria = self::CATEGORIA_CONGELADOS;
    }
}
