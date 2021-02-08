<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nilai}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%peserta}}`
 * - `{{%user}}`
 * - `{{%indikator}}`
 */
class m210206_154305_create_nilai_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nilai}}', [
            'id' => $this->primaryKey(),
            'id_peserta' => $this->integer()->notNull(),
            'id_penilai' => $this->integer()->notNull(),
            'id_indikator' => $this->integer()->notNull(),
            'nilai' => $this->integer(),
        ]);

        // creates index for column `id_peserta`
        $this->createIndex(
            '{{%idx-nilai-id_peserta}}',
            '{{%nilai}}',
            'id_peserta'
        );

        // add foreign key for table `{{%peserta}}`
        $this->addForeignKey(
            '{{%fk-nilai-id_peserta}}',
            '{{%nilai}}',
            'id_peserta',
            '{{%peserta}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_penilai`
        $this->createIndex(
            '{{%idx-nilai-id_penilai}}',
            '{{%nilai}}',
            'id_penilai'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-nilai-id_penilai}}',
            '{{%nilai}}',
            'id_penilai',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_indikator`
        $this->createIndex(
            '{{%idx-nilai-id_indikator}}',
            '{{%nilai}}',
            'id_indikator'
        );

        // add foreign key for table `{{%indikator}}`
        $this->addForeignKey(
            '{{%fk-nilai-id_indikator}}',
            '{{%nilai}}',
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
        // drops foreign key for table `{{%peserta}}`
        $this->dropForeignKey(
            '{{%fk-nilai-id_peserta}}',
            '{{%nilai}}'
        );

        // drops index for column `id_peserta`
        $this->dropIndex(
            '{{%idx-nilai-id_peserta}}',
            '{{%nilai}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-nilai-id_penilai}}',
            '{{%nilai}}'
        );

        // drops index for column `id_penilai`
        $this->dropIndex(
            '{{%idx-nilai-id_penilai}}',
            '{{%nilai}}'
        );

        // drops foreign key for table `{{%indikator}}`
        $this->dropForeignKey(
            '{{%fk-nilai-id_indikator}}',
            '{{%nilai}}'
        );

        // drops index for column `id_indikator`
        $this->dropIndex(
            '{{%idx-nilai-id_indikator}}',
            '{{%nilai}}'
        );

        $this->dropTable('{{%nilai}}');
    }
}
