<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Add product';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="main-addProduct">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'price')->textInput() ?>

                <?= $form->field($model, 'stock')->textInput() ?>

                
                

                <div class="form-group">
                    <?= Html::submitButton('add', ['class' => 'btn btn-primary', 'name' => 'add-button']) ?>
                    <?php  $model->save(); ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>