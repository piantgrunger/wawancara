<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sekolah}}`.
 */
class m210205_040305_create_sekolah_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sekolah}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->unique()->notNull(),
            'alamat' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sekolah}}');
    }
}

