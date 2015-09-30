<?php

namespace vendor\kuakling\myiicms\modules\navigation\controllers;

use Yii;
use vendor\kuakling\myiicms\modules\navigation\models\Navigation;
use vendor\kuakling\myiicms\modules\navigation\models\NavigationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DefaultController extends Controller
{

    public function actionIndex()
    {
    	//$menu = self::getMenu();
        $menu = Navigation::getSiteMenuArray();
        return $this->render('index', ['menu'=>$menu,]);
    }

    
}
