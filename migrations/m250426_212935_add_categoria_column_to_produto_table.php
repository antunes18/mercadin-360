<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%produto}}`.
 */
class m250426_212935_add_categoria_column_to_produto_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            'produto',
            'categoria',
            "ENUM(
                'Hortifruti',
                'Açougue',
                'Mercearia',
                'Frios e Laticínios',
                'Bebidas Alcoólicas',
                'Bebidas Não Alcoólicas',
                'Limpeza',
                'Higiene Pessoal',
                'Papelaria',
                'Padaria',
                'Congelados'
            ) NOT NULL"
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('produto', 'categoria');
    }
}
