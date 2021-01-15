<?php

use yii\db\Migration;

/**
 * Class m200107_161436_product_table
 */
class m200107_161436_product_table extends Migration
{


    
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->integer()->notNull(),
            'stock' => $this->integer()->notNull(),
        ], $tableOptions);


        $this->insert('product', [
            "name" => "Sony Xperia XZ1",
            "price" => 4500,
            "stock"=>30,
        ]);
        $this->insert('product', [
            "name" => "Sony Xperia XZ",
            "price" => 2300,
            "stock"=>30,
        ]);
        $this->insert('product', [
            "name" => "Iphone XS Small",
            "price" => 12000,
            "stock"=>30,
        ]);
        $this->insert('product', [
            "name" => "Xaomi Redmi 6",
            "price" => 3000,
            "stock"=>30,
        ]);
        $this->insert('product', [
            "name" => "Samsung Galaxy Note 11",
            "price" => 12000,
            "stock"=>30,
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%product}}');
    }
}
