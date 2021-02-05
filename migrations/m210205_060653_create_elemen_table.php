<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%elemen}}`.
 */
class m210205_060653_create_elemen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%elemen}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->unique()->notNull(),
            'nilai' => $this->decimal(19,2)->notNull(),
            'prasyarat_minimal' => $this->decimal(19,2)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%elemen}}');
    }
}
