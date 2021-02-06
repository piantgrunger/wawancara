<?php

use yii\db\Migration;

/**
 * Class m210205_094313_alterUser
 */
class m210205_094313_alterUser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addColumn('user', 'id_sekolah', $this->integer());
      $this->addColumn('user', 'tanggal_lahir', $this->date());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210205_094313_alterUser cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210205_094313_alterUser cannot be reverted.\n";

        return false;
    }
    */
}
