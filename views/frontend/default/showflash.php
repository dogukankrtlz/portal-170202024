


<?php
   use yii\bootstrap\Alert;
   $message = "Successful. Shopping amount is $cost pounds";
   Yii::$app->session->setFlash('buy', $message);
   echo Alert::widget([
      'options' => ['class' => 'alert-info'],
      'body' => Yii::$app->session->getFlash('buy'),
      
   ]);
?>

<?= $this->render('index', [
            'dataProvider' => $dataProvider,
        ]) ?>