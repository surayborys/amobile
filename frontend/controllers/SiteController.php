<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\ContactForm;
use frontend\models\Serial;
use yii\web\NotFoundHttpException;
use frontend\models\Tarif;
use yii\db\Expression;

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
        
        return $this->render('index', [
            'tarifs' => $tarifs
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
        
        return $this->render('single', [
            'tarif' => $tarif,
        ]);
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
}
