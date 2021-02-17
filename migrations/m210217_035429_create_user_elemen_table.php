<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_elemen}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%elemen}}`
 * - `{{%user}}`
 */
class m210217_035429_create_user_elemen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_elemen}}', [
            'id' => $this->primaryKey(),
            'id_elemen' => $this->integer()->notNull(),
            'id_user' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_elemen`
        $this->createIndex(
            '{{%idx-user_elemen-id_elemen}}',
            '{{%user_elemen}}',
            'id_elemen'
        );

        // add foreign key for table `{{%elemen}}`
        $this->addForeignKey(
            '{{%fk-user_elemen-id_elemen}}',
            '{{%user_elemen}}',
            'id_elemen',
            '{{%elemen}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_user`
        $this->createIndex(
            '{{%idx-user_elemen-id_user}}',
            '{{%user_elemen}}',
            'id_user'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_elemen-id_user}}',
            '{{%user_elemen}}',
            'id_user',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%elemen}}`
        $this->dropForeignKey(
            '{{%fk-user_elemen-id_elemen}}',
            '{{%user_elemen}}'
        );

        // drops index for column `id_elemen`
        $this->dropIndex(
            '{{%idx-user_elemen-id_elemen}}',
            '{{%user_elemen}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_elemen-id_user}}',
            '{{%user_elemen}}'
        );

        // drops index for column `id_user`
        $this->dropIndex(
            '{{%idx-user_elemen-id_user}}',
            '{{%user_elemen}}'
        );

        $this->dropTable('{{%user_elemen}}');
    }
}
