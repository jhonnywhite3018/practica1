<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\data;
use app\models\Entradas;
use yii\data\ActiveDataProvider;
use app\models\ContactForm;


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
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionListar () {
        $registros = Entradas::find()->asArray()->all();
        
        return $this->render('listar', 
                [
                    'datos'=>$registros
                ],);
    }
    public function actionListar1 () {
        $registros = Entradas::find()->all();
        
        return $this->render('listarTodos', 
                [
                    'datos'=>$registros
                ],);
    }
    public function actionListar2 () {
        $registros = Entradas::find()->select(['texto'])->asArray()->all();
        
        return $this->render('listarTodos', 
                [
                    'datos'=>$registros
                ],);
    }
    
    public function actionListar3 () {
        $registros = Entradas::find()->select(['texto'])->all();
        
        return $this->render('listarTodos', 
                [
                    'datos'=>$registros
                ],);
    }
    public function actionListar4 () {
        $registros = new Entradas();
        
        return $this->render('listarTodos', 
                [
                    'datos'=>$registros->find()->all()
                ],);
    }
    
    public function actionListar5 () {
        $registros = new Entradas();
        
        return $this->render('listarTodos', 
                [
                    'datos'=>$registros->findOne(1)
                ],);
    }
    public function actionListar6(){
        return $this->render('listarTodos', 
                [
                    'datos'=>yii::$app->db->createCommand("select * from entradas")->queryall(),
                
                ],);
    }
    public function actionMostrar(){
        $dataProvider = new ActiveDataProvider([
            'query'=>Entradas::find(),
        ]);
        return $this->render('mostrar', 
                [
                    'dataProvider'=>$dataProvider,
                ],);
    }
    public function actionMostraruno(){
        return $this->render('mostrarUno',[
            'model' =>Entradas::findOne(1),
        ]);
    }
    public function actionEntradas(){
        return $this->render('entradas',[
            'model' =>Entradas::findOne(1),
        ]);
    }
   
}
