<?php

use yii\db\Migration;

/**
 * Class m200107_161436_product_table
 */
class m200110_202334_sold_products_table extends Migration
{


    
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {

            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%sold_products}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->integer()->notNull(),
            'stock' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%sold_products}}');
    }
}
