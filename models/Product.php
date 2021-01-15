<?php

namespace main\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $name
 * @property int $price
 * @property int $stock
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'stock'], 'required'],
            [['price', 'stock'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'price' => 'Price',
            'stock' => 'Stock',
        ];
    }
}
