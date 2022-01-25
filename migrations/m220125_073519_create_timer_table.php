<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%timer}}`.
 */
class m220125_073519_create_timer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%timer}}', [
            'id' => $this->primaryKey(),
            'id_peserta' => $this->integer()->notNull(),
            'id_penilai' => $this->integer()->notNull(),
            'sisawaktu' => $this->decimal(19, 4)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%timer}}');
    }
}
