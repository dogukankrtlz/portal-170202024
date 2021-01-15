<?php
namespace main\controllers\api;


/**
 * Default controller for the `main` module
 */
class DefaultController extends ActiveController
{
    public $modelClass = \main\models\Product';
    
    public function actionIndex()
    {
        return $this->render('index');
    }
}
