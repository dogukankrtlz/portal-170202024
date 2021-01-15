<?php

namespace main\controllers\console;
//namespace app\commands;

use yii\console\Controller;

class DefaultController extends \kouosl\base\controllers\console\BaseController
{
    public $message;
    public function options($actionID)
    {
        return [’message’];
    }
    
    public function optionAliases()
    {
        return [’m’ => ’message’];
    }
    
    public function actionIndex()
    {
        echo $this->message . "\n";
    }
}
