<?php

use yii\db\Migration;

/**
 * Class m220207_082945_addzoomidPeserta
 */
class m220207_082945_addzoomidPeserta extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('peserta', 'zoom_id', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220207_082945_addzoomidPeserta cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220207_082945_addzoomidPeserta cannot be reverted.\n";

        return false;
    }
    */
}
