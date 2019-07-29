<?php


namespace app\controllers;

use Yii;
use yii\web\Controller;

class AgeController extends Controller
{
    public function actionAgeCheck()
    {
        $this->layout = 'empty';
        
        return $this->render('index', compact('session'));
    }
}
