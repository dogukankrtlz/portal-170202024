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

$this->title = 'All Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create New Product', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Show sold products', ['sold'], ['class' => 'btn btn-success']) ?>
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