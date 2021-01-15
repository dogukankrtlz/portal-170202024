<?php
namespace profile\controllers\frontend;

use kouosl\profile\models\UserForm;
use yii\filters\AccessControl;

/**
 * Default controller for the `content` module
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
       
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [ 
                            'allow' => true,
                            'roles' => ['?'],
                        ],
                        [ 
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ]
        ]);
       
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = ['body' => ''];
        return $this->render('index',[
            'model' =>$model ,
        ]);
    }
    public function actionView($id){
        return $this->render('index',[
            'model' => $this->findModel($id) ,
        ]);
    }
    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        }

    }

    public function actionUser()
    {
        $model = new UserForm;

        if($model->load(Yii::$app->request->post()) && $model->validate())
        {

        }else{
            return $this->render('userForm',['model'=>$model]);
        }
    }
}
