<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venda".
 *
 * @property int $id
 * @property string $data_venda
 * @property int|null $id_cliente
 * @property string $forma_pagamento
 *
 * @property Cliente $cliente
 * @property ItemVenda[] $itemVendas
 */
class Venda extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const FORMA_PAGAMENTO_PIX = 'PIX';
    const FORMA_PAGAMENTO_DEBITO = 'débito';
    const FORMA_PAGAMENTO_CREDITO = 'crédito';
    const FORMA_PAGAMENTO_DINHEIRO = 'dinheiro';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente'], 'default', 'value' => null],
            [['data_venda'], 'safe'],
            [['id_cliente'], 'integer'],
            [['forma_pagamento'], 'required'],
            [['forma_pagamento'], 'string'],
            ['forma_pagamento', 'in', 'range' => array_keys(self::optsFormaPagamento())],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::class, 'targetAttribute' => ['id_cliente' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_venda' => 'Data Venda',
            'id_cliente' => 'Id Cliente',
            'forma_pagamento' => 'Forma Pagamento',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::class, ['id' => 'id_cliente']);
    }

    /**
     * Gets query for [[ItemVendas]].
     *
     * @return \yii\db\ActiveQuery|ItemVendaQuery
     */
    public function getItemVendas()
    {
        return $this->hasMany(ItemVenda::class, ['id_venda' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return VendaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VendaQuery(get_called_class());
    }


    /**
     * column forma_pagamento ENUM value labels
     * @return string[]
     */
    public static function optsFormaPagamento()
    {
        return [
            self::FORMA_PAGAMENTO_PIX => 'PIX',
            self::FORMA_PAGAMENTO_DEBITO => 'débito',
            self::FORMA_PAGAMENTO_CREDITO => 'crédito',
            self::FORMA_PAGAMENTO_DINHEIRO => 'dinheiro',
        ];
    }

    /**
     * @return string
     */
    public function displayFormaPagamento()
    {
        return self::optsFormaPagamento()[$this->forma_pagamento];
    }

    /**
     * @return bool
     */
    public function isFormaPagamentoPix()
    {
        return $this->forma_pagamento === self::FORMA_PAGAMENTO_PIX;
    }

    public function setFormaPagamentoToPix()
    {
        $this->forma_pagamento = self::FORMA_PAGAMENTO_PIX;
    }

    /**
     * @return bool
     */
    public function isFormaPagamentoDebito()
    {
        return $this->forma_pagamento === self::FORMA_PAGAMENTO_DEBITO;
    }

    public function setFormaPagamentoToDebito()
    {
        $this->forma_pagamento = self::FORMA_PAGAMENTO_DEBITO;
    }

    /**
     * @return bool
     */
    public function isFormaPagamentoCredito()
    {
        return $this->forma_pagamento === self::FORMA_PAGAMENTO_CREDITO;
    }

    public function setFormaPagamentoToCredito()
    {
        $this->forma_pagamento = self::FORMA_PAGAMENTO_CREDITO;
    }

    /**
     * @return bool
     */
    public function isFormaPagamentoDinheiro()
    {
        return $this->forma_pagamento === self::FORMA_PAGAMENTO_DINHEIRO;
    }

    public function setFormaPagamentoToDinheiro()
    {
        $this->forma_pagamento = self::FORMA_PAGAMENTO_DINHEIRO;
    }
}
