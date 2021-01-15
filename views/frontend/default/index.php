<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shopping page';
$this->params['breadcrumbs'][] = $this->title;

?>




<div class="product-index",>

    <h1 style="text-align:center"><?= Html::encode($this->title) ?></h1>
    <h3>Welcome,</h3>
    <p>For shopping select product and click the buy button.</p>
    <p>Sample text: Product descriptions play a huge part in generating 
    sales. But what should they say? How long should they be? What format 
    is best? How do I make them rank high in search engines? We suggest 
    using the following template to ensure you are crafting the best product description.</p>



    <?=Html::beginForm(['buy'],'post');?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'price',
            'stock',
            ['class' => 'yii\grid\CheckboxColumn',],
            
            
        ],
        
    ]); ?>

    <?=Html::submitButton('Buy', ['class' => 'btn btn-info',]);?>
    
    <?= Html::endForm();?> 


</div>



