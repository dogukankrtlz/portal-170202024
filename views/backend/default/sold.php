<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kouosl\main\models\product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sold products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Soldproducts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>All products sold so far</p>
    <p>Sample text: Product descriptions play a huge part in generating 
    sales. But what should they say? How long should they be? What format 
    is best? How do I make them rank high in search engines? We suggest 
    using the following template to ensure you are crafting the best product description.</p>

    
    <p>
        <?= Html::a('Show all products', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'price',
            'stock',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>