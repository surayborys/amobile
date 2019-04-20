<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\ContactForm;
use frontend\models\Serial;
use yii\web\NotFoundHttpException;
use frontend\models\Tarif;
use frontend\models\Order;
use frontend\models\forms\OrderForm;
use yii\db\Expression;
use yii\web\Response;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    /**
    * @inheritdoc
    */
   public function beforeAction($action)
   {            
       if ($action->id == 'connect') {
           $this->enableCsrfValidation = false;
       }

       return parent::beforeAction($action);
   }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        # select 4 random tariffs with eager loading
        $tarifs = Tarif::find()->with('genCostUM')->orderBy(new Expression('rand()'))->limit(4)->all();
        
        if(!$tarifs) {
            $tarifs = false;
        }
        
        #get office marks [{id: int_val_id, lat: float_val_lat, lng: float_val_lng}] :contains ids, latitude and longitude for each office
        $office_marks = $this->getOfficeMarks();
        
        return $this->render('index', [
            'tarifs' => $tarifs,
            'office_marks' => $office_marks
        ]);
    }
    
    /**
     * grabs data for displaying the tariffs page
     * 
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionTariff()
    {
        # use eager loading to decrease a number of db-queries
        $serials = Serial::find()->with('tarifs.genCostUM')->where(['status_active' => Serial::SERIAL_STATUS_ACTIVE])->andFilterWhere(['not in','title', ['Корпоративные', 'Для гостей']])->orderBy('order_weight', 'id')->all();
        if(!$serials) {
            throw new NotFoundHttpException('Категории тарифов для данного раздела пока не описаны на сайте...');
        }
        
        # set required values for displaying in the view
        $pageTitle = 'Тарифы';
        $headerText = '<h1 class="h1">Тарифы</h1>';
        
        return $this->render('tariff', [
            'serials' => $serials,
            'pageTitle' => $pageTitle,
            'headerText' => $headerText,
        ]);
    }
    
    /**
     * grabs data for displaying the corporate tariffs page
     * 
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionCorporate()
    {
        # use eager loading to decrease a number of db-queries
        $serials = Serial::find()->with('tarifs.genCostUM')->where(['status_active' => Serial::SERIAL_STATUS_ACTIVE])->andFilterWhere(['in', 'title', (['Корпоративные', 'Архив'])])->orderBy('order_weight', 'id')->all();
        if(!$serials) {
            throw new NotFoundHttpException('Категории тарифов для данного раздела пока не описаны на сайте...');
        }
        
        # set required values for displaying in the view
        $pageTitle = 'Корпоративные тарифы';        
        $headerText = '<h1 class="h1 corporate_tarif_title">Корпоративные<br>тарифы</h1>';
        
        return $this->render('tariff', [
            'serials' => $serials,
            'pageTitle' => $pageTitle,
            'headerText' => $headerText,
        ]);
    }
    
    /**
     * grabs data for displaying the guest tariffs page
     * 
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionGuestTariffs()
    {
        # use eager loading to decrease a number of db-queries
        $serials = Serial::find()->with('tarifs.genCostUM')->where(['status_active' => Serial::SERIAL_STATUS_ACTIVE])->andFilterWhere(['in', 'title', (['Для гостей', 'Архив'])])->orderBy('order_weight', 'id')->all();
        if(!$serials) {
            throw new NotFoundHttpException('Категории тарифов для данного раздела пока не описаны на сайте...');
        }
        
        # set required values for displaying in the view
        $pageTitle = 'Гостям Абхазии';        
        $headerText = '<h1 class="h1 corporate_tarif_title">Гостям<br>Абхазии</h1>';
        
        return $this->render('tariff', [
            'serials' => $serials,
            'pageTitle' => $pageTitle,
            'headerText' => $headerText,
        ]);
    }
    
    public function actionSingleTariff($id) 
    {
        # get single tarif
        $tarif = Tarif::find()
                ->with('condConnectCostUM', 'condFullCostUM', 'genCostUM', 'incMinutesAmobileUM','incMinutesInernationalUM', 'incMinutesSmsAbhasiaUM', 'incMinutesStationarUM', 'incInternetUM', 'incPrepaidInternationalUM', 'incPrepaidInternetUM', 'incPrepaidMinutesSmsUM', 'interCallUM', 'internetTrafficCostUM', 'overpaidCallUM', 'smsCostUM', 'videocallCostUM', 'serial')
                ->asArray()
                ->where(['id' => $id])
                ->one();
        
        #check if tarif exists
        if(!$tarif) {
            throw new NotFoundHttpException('Искомый тариф не найден ...');
        }
        
        #get office marks [{id: int_val_id, lat: float_val_lat, lng: float_val_lng}] :contains ids, latitude and longitude for each office
        $office_marks = $this->getOfficeMarks();
        
        return $this->render('single', [
            'tarif' => $tarif,
            'office_marks' => $office_marks
        ]);        
    }
    
    /**
     * gets ids, longitude and latitude for all of the offices
     * 
     * @return JSON
     */
    private function getOfficeMarks() 
    {
        $marks = \frontend\models\Office::find()->select(['id', 'lat', 'lng'])->asArray()->all();
        if($marks) {
            return json_encode($marks);
        } else {
            return json_encode(['id'=>1010101, 'lat'=>0.0, 'lng'=>0.0]);
        }
        
    }

    

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }  
    
    /**
     * handles adding a new record to the 'order' table
     * 
     * @return JSON
     */
    public function actionConnect()
    {   
        
        #1 set the response format to JSON
        Yii::$app->response->format = Response::FORMAT_JSON;

        #1 detect the mode of the order
        if(!$type = Yii::$app->request->post('type')) {
            return [
                'success' => false,
                'field' => true,
                'field_name' => 'Неожиданная ошибка. Невозможно обработать ваш заказ',
            ];
        }
        
        #3 create new order form and set model attributes depending on the mode of the order
        switch ($type) {
            case Order::MODE_IN_OFFICE:
                
                $form = new OrderForm();
                $form->scenario = OrderForm::SCENARIO_OFFICE;
                
                $form->fullname = Yii::$app->request->post('name');
                $form->email = Yii::$app->request->post('email');
                $form->phone_number = Yii::$app->request->post('phone');
                $form->mode = Yii::$app->request->post('type');
                #$form->tarif_id = Yii::$app->request->post('tariff');
                #check if the tarif id is sended by form, otherwise use the default tarif_id value
                if(!$form->tarif_id = Yii::$app->request->post('tariff')):
                    $form->tarif_id = Order::DEFAULT_TARIF_ID;
                endif;
                $form->office_id = Yii::$app->request->post('office_id');
                $form->status = Order::STATUS_NEW;
                
                break;
            
            case Order::MODE_COURIER:
                
                $form = new OrderForm();
                $form->scenario = OrderForm::SCENARIO_COURIER;
                
                $form->fullname = Yii::$app->request->post('name');
                $form->email = Yii::$app->request->post('email');
                $form->phone_number = Yii::$app->request->post('phone');
                $form->mode = Yii::$app->request->post('type');
                $form->city = Yii::$app->request->post('town');
                $form->street = Yii::$app->request->post('street');
                $form->house = Yii::$app->request->post('house_num');
                $form->housing = Yii::$app->request->post('korpus');
                $form->apartment_office_num = Yii::$app->request->post('flat_num');
                #$form->tarif_id = Yii::$app->request->post('tariff');
                #check if the tarif id is sended by form, otherwise use the default tarif_id value
                if(!$form->tarif_id = Yii::$app->request->post('tariff')):
                    $form->tarif_id = Order::DEFAULT_TARIF_ID;
                endif;                
                $form->status = Order::STATUS_NEW;
                
                break;
            
            default:
                break;
        }
        
        #4 validate and save the model
        if($form && $form->validate()) {
            $form->createOrder();
            return [
                'success' => true,
                'status' => true
            ];
        }
        
        return [
               'success' => false,
               'field' => true,
               'field_name' => 'Ошибка обработки. Невозможно обработать ваш заказ',
        ];
    }
        
}
