<?php

namespace app\controllers;

use app\models\Users;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    public $enableCsrfValidation = false;
    
    public function actionIndex()
    {

        $this->layout = 'empty';
        
        $session = Yii::$app->session;
        $session->set('lang', 'ru');
        if (isset($_POST['day']) && isset($_POST['month']) && isset($_POST['year'])) {
            $day = $_POST['day'];
            $month = $_POST['month'];
            $year = $_POST['year'];
            $record = $day . '-' . $month . '-' . $year . '';
            $bday = $day . '.' . $month . '.' . $year;

            $age = date_diff(date_create($record), date_create('now'))->y;
            
            $session->set('bday', $bday);
            $session->set('age', $age);

            if (strtotime($year . '-' . $month . '-' . $day . ' 00:00:00') > strtotime('-21 years')) {
                $session->set('checked', false);
            } else {
                $session->set('checked', true);
            }
        }
        
        if ($session->get('checked')) {
            return $this->render('index');
        } else {
            return $this->render('ageCheck');
        }
    }

    
    public function actionTop()
    {
        $this->layout = 'main';
        $winners = Yii::$app->coreService->getRatings();
        
        return $this->render('top', ['winners' => $winners['data']]);
    }
    
    public function actionProfile()
    {
        if ($id = Yii::$app->session->get('user_id')) {
            $model = Users::findOne($id);
            return $this->render('profile', compact('model'));
        }
        
        return $this->redirect('site/index');
    }
    
    public function actionRegistercode($code)
    {
        if ($id = Yii::$app->session->get('user_id')) {
            $user = Users::findOne($id);
            $time = date('d-m-Y H:i:s');
            $transaction_id = uniqid();
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            
            return Yii::$app->coreService->registerCode(str_replace('-', ' ', $code), str_replace('+', '', $user->user_phone), $transaction_id, $time);
        }
    }
    
    public function actionLogin()
    {
        $this->layout = 'empty';
        
        if ($id = Yii::$app->session->get('user_id')) {
            return $this->redirect('profile');
        }
        if (isset($_POST['phone'])) {
            $phone = str_replace(['(', ')', ' ', '-'], '', $_POST['phone']);
            $psw = $_POST['password'];
            $model = Users::find()
                ->andWhere(['user_phone' => $phone])
                ->andWhere(['user_password' => $psw])
                ->one();
            
            if (!is_null($model)) {
                Yii::$app->session->set('user_id', $model->id);
                return $this->redirect('profile');
            }
            
        }
        return $this->render('login');
    }
    
    public function actionLogout()
    {
        Yii::$app->session->remove('user_id');
        
        return $this->redirect('site/index');
    }
    
    public function actionSignup()
    {
        $this->layout = 'empty';
        
        if ($id = Yii::$app->session->get('user_id')) {
            return $this->redirect('site/index');
        }
        if (isset($_POST['ref'])) {
            $ref = $_POST['ref'];
        } else {
            $ref = null;
        }
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $city = $_POST['city'];
            
            $phone = str_replace('-', '', $phone);
            $phone = str_replace('(', '', $phone);
            $phone = str_replace(')', '', $phone);
            $phone = str_replace(' ', '', $phone);
            
            $psw = $_POST['password'];
            $gender = $_POST['gender'];
            $ref = $_POST['ref'];
            $user = Yii::$app->coreService->registration($name, $phone, $email, $psw, $city, $ref);
            $session = Yii::$app->session;
            $age = $session->get('age');
            $bday = $session->get('bday');
            Yii::$app->coreService->createProfile($type = 'web', $lang = 'ru', $phone, $last_name = null, $name, $middle_name = null, $age, $gender, $city, $bday, $email);
            Yii::$app->session->set('user_id', $user->id);
            return $this->redirect('profile');
        }
        return $this->render('signup', ['ref_id' => $ref]);
    }
    
    public function actionImageUpload()
    {
        $image = UploadedFile::getInstanceByName('file');
        $fileName = uniqid() . "." . $image->getExtension();
        $image->saveAs('images/' . $fileName);
        
        Yii::$app->coreService->imageWithFrame("images/" . $fileName, 'frame.png', "images/" . $fileName);
        
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'success' => true,
            'path' => '/images/' . $fileName
        ];
    }
    
    public function actionInstCheck()
    {
        $res = Yii::$app->coreService->instagramTagsCheck($_POST['link']);
        $res = $res ? 'true' : 'false';
        return $this->redirect('/site/profile?instagram-check=' . $res);
    }
    
    public function actionChangeLanguage()
    {
        if (Yii::$app->session->get('language') == 'kz') {
            Yii::$app->session->set('language', 'ru');
        } else {
            Yii::$app->session->set('language', 'kz');
        }
        
        return $this->redirect('/site/index');
    }
}
