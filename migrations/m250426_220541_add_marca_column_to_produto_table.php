<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%produto}}`.
 */
class m250426_220541_add_marca_column_to_produto_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('produto', 'marca', $this->string(50)->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('produto', 'marca');
    }
}
