<?php

namespace main\models;

use Yii;

/**
 * This is the model class for table "product".
 *@property int $id
 * @property string $name
 * @property int $price
 * @property int $stock
 */
class Sold_products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sold_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','name', 'price', 'stock'], 'required'],
            [['id','price', 'stock'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'name' => 'Name',
            'price' => 'Price',
            'stock' => 'Stock',
        ];
    }
}
