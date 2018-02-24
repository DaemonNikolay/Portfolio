<?php

use yii\db\Migration;

/**
 * Handles the creation of table `specialty`.
 */
class m171215_031642_create_specialty_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('specialty', [
            'id' => $this->primaryKey(),
            'specialty'=>$this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('specialty');
    }
}
