<?php

use yii\db\Migration;

/**
 * Handles adding specialty to table `specialists`.
 */
class m171213_181227_add_specialty_column_to_specialists_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('specialists', 'specialty', 'string');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('specialists', 'specialty');
    }
}
