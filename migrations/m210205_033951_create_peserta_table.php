<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%peserta}}`.
 */
class m210205_033951_create_peserta_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%peserta}}', [
            'id' => $this->primaryKey(),
            'nopeserta' => $this->string(),
            'nama' => $this->string(),
            'tgl_lahir' => $this->date(),
            'status' => $this->integer()->notNull()->defaultValue(1),
            'foto' =>$this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%peserta}}');
    }
}
