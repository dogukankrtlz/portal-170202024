<?php

namespace main\controllers\frontend;

use Yii;
use kouosl\main\models\sold_products;
use kouosl\main\models\product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * DefaultController implements the CRUD actions for product model.
 */
class DefaultController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    

    public function actionBuy(){
        if(Yii::$app->user->can('create-sold_products')){
            $amount = 0;
            $selection=(array)Yii::$app->request->post('selection');//typecasting
            foreach($selection as $id){

                $e=product::findOne((int)$id);//make a typecasting
                $e->stock -= 1;
                $amount += $e->price;
                $e->save();

                if (sold_products::find()->where( [ 'id' => $e->id ] )->exists() ) {

                    $new_sold =  sold_products::findOne((int)$e->id);
                    $new_sold->stock += 1;
                    $new_sold->save();

                }else{
                    $new_sold = new \kouosl\main\models\Sold_products;
                    $new_sold->id = $e->id;
                    $new_sold->name =  $e->name;
                    $new_sold->price =  $e->price;
                    $new_sold->stock = 1;
                    $new_sold->save();
                }

        }

        }else{
            throw new ForbiddenHttpException;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => product::find(),
        ]);


        return $this->render('showflash', [
            'dataProvider' => $dataProvider,
            'cost' => $amount,
        ]);

        }

    /**
     * Lists all product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $num = -1;
        $model = new \main\models\Product;

        $dataProvider = new ActiveDataProvider([
            'query' => product::find(),
        ]);//Bütün kayıtları $dataProvider'e atar.

        

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);//İndex sayfasına $dataProvider değişkenini döndürür.
    }

    /**
     * Displays a single product model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {//View sayfasına $id'ye sahip kaydı döndürür ve sergilenmesini sağlar.
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Updates an existing product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionAdd($id)
    {
        $model = $this->findModel($id);

        //$newmodel = new product();Sipariş tablosuna kaydedilir
        //Yada ürünün stoğu düşülür.


        if (($model = product::findOne($id)) !== null) {
            //Bu id'ye sahip bir kayıt varsa stoğu düşülür veya kopyası sipariş listesine eklenir.
            //return $model;

        }

        /*return $this->render('update', [
            'model' => $model,
        ]);*/
    }
    

    /**
     * Finds the product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionShowFlash() {
        $session = Yii::$app->session;
        
        $session->setFlash('buy', 'Satın alma başarılı!');
        return $this->render('showflash');
     }
}
