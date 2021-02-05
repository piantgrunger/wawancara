<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%indikator}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%elemen}}`
 */
class m210205_062723_create_indikator_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%indikator}}', [
            'id' => $this->primaryKey(),
            'id_elemen' => $this->integer()->notNull(),
            'nama' => $this->string()->notNull(),
            'pertanyaan' => $this->text()->notNull(),
        ]);

        // creates index for column `id_elemen`
        $this->createIndex(
            '{{%idx-indikator-id_elemen}}',
            '{{%indikator}}',
            'id_elemen'
        );

        // add foreign key for table `{{%elemen}}`
        $this->addForeignKey(
            '{{%fk-indikator-id_elemen}}',
            '{{%indikator}}',
            'id_elemen',
            '{{%elemen}}',
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
            '{{%fk-indikator-id_elemen}}',
            '{{%indikator}}'
        );

        // drops index for column `id_elemen`
        $this->dropIndex(
            '{{%idx-indikator-id_elemen}}',
            '{{%indikator}}'
        );

        $this->dropTable('{{%indikator}}');
    }
}
