<?php
/**
 * Created by PhpStorm.
 * User: qwert
 * Date: 07/11/2018
 * Time: 01:17 AM
 */


namespace frontend\controllers;
use yii\data\ActiveDataProvider;
use common\models\Blog;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class  BlogController extends Controller{





    public function actionIndex()
    {
        $blogs=Blog::find()->all();
        $dataProvider = new ActiveDataProvider([
            'query' => $blogs,
            'pagination'=>[
                'pageSize'=>10
            ],
            'sort'=>
                [
                    'defaultOrder'=>[
                        'id'=> SORT_DESC,
                    ]
                ]
        ]);


        return $this->render('all',['blogs'=>$blogs]);
    }
    public function actionOne($url)
    {
        if($blog=Blog::find()->andWhere(['url'=>$url])->one()){


        return $this->render('one',['blog'=>$blog]);}
        throw new NotFoundHttpException();
    }
}