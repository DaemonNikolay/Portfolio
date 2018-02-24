<?php

use yii\db\Migration;

/**
 * Handles the creation of table `specialists`.
 */
class m171213_142834_create_specialists_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('specialists', [
            'id' => $this->primaryKey(),
            'surname'=>$this->string(),
            'name'=>$this->string(),
            'patronymic'=>$this->string(),
            'email'=>$this->string(),
            'phone'=>$this->string(),
            'image'=>$this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('specialists');
    }
}
