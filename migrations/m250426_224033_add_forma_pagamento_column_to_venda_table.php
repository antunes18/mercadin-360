<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%venda}}`.
 */
class m250426_224033_add_forma_pagamento_column_to_venda_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            'venda',
            'forma_pagamento',
            "ENUM(
                'PIX',
                'débito',
                'crédito',
                'dinheiro'
            ) NOT NULL DEFAULT 'dinheiro'"
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('venda', 'forma_pagamento');
    }
}
