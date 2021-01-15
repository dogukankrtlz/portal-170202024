<?php
namespace main;
use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\HttpException;
/**
 * main module definition class
 */
class Module extends \base\Module
{
    public $controllerNamespace = '';
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        switch ($this->namespace)
        {
            case 'backend':{
            };break;
            case 'frontend':{
            };break;
            case 'api':{
                $behaviors['authenticator'] = [
                    'class' => CompositeAuth::className(),
                    'authMethods' => [
                        HttpBasicAuth::className(),
                        HttpBearerAuth::className(),
                        QueryParamAuth::className(),
                    ],
                ];
            };break;
            case 'console':{
            };break;
            default:{
                throw new HttpException(500,'behaviors'.$this->namespace);
            };break;
        }
        return $behaviors;
    }
    public function registerTranslations()
    {
        Yii::$app->i18n->translations['main/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@kouosl/main/messages',
            'fileMap' => [
                'main/main' => 'main.php',
            ],
        ];
    }
    public static function t($category, $message, $params = [], $language = null)
    {
         Yii::$app->i18n->translations['main/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@kouosl/main/messages',
            'fileMap' => [
                'main/main' => 'main.php',
            ],
        ];
        
        return Yii::t('main/'. $category, $message, $params, $language);
    }
    public static function initRules(){
        return $rules = [
            [
                'class' => 'yii\rest\UrlRule',
                'controller' => [
                   'main/mains',
                ],
                'tokens' => [
                    '{id}' => '<id:\\w+>'
                ],

            ],
        ] ;
    }
}