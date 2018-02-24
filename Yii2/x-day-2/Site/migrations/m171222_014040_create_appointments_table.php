<?php

use yii\db\Migration;

/**
 * Handles the creation of table `appointments`.
 */
class m171222_014040_create_appointments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('appointments', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'specialist_id' => $this->integer()->notNull(),
            'date_of_admission' => $this->date()->notNull()
        ]);

        $this->createIndex(
            'idx-id-user_id',
            'appointments',
            'user_id');

        $this->addForeignKey(
            'fk-appointments-user_id',
            'appointments',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-id-specialist_id',
            'appointments',
            'specialist_id'
        );

        $this->addForeignKey(
            'fk-appointmnets-specialist_id',
            'appointments',
            'specialist_id',
            'specialists',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-appointments-user_id',
            'appointments'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-id-user_id',
            'appointments'
        );

        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-appointmnets-specialist_id',
            'appointments'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-id-specialist_id',
            'appointments'
        );


        $this->dropTable('appointments');
    }
}
