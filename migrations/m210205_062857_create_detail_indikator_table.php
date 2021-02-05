<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%detail_indikator}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%indikator}}`
 */
class m210205_062857_create_detail_indikator_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%detail_indikator}}', [
            'id' => $this->primaryKey(),
            'id_indikator' => $this->integer()->notNull(),
            'jawaban' => $this->string()->notNull(),
            'nilai' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_inikator`
        $this->createIndex(
            '{{%idx-detail_indikator-id_inikator}}',
            '{{%detail_indikator}}',
            'id_indikator'
        );

        // add foreign key for table `{{%indikator}}`
        $this->addForeignKey(
            '{{%fk-detail_indikator-id_inikator}}',
            '{{%detail_indikator}}',
            'id_indikator',
            '{{%indikator}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%indikator}}`
        $this->dropForeignKey(
            '{{%fk-detail_indikator-id_inikator}}',
            '{{%detail_indikator}}'
        );

        // drops index for column `id_inikator`
        $this->dropIndex(
            '{{%idx-detail_indikator-id_inikator}}',
            '{{%detail_indikator}}'
        );

        $this->dropTable('{{%detail_indikator}}');
    }
}
