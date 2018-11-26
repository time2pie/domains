<?php

namespace backend\controllers;

use common\modules\blog\models\Blog;
use http\Url;
use Yii;
use yii\base\DynamicModel;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    /* public function actionSaveRedactorImg($sub = 'main')
     {
         $this->enableCsrfValidation = false;
         if (Yii::$app->request->isPost) {
             $dir = Yii::getAlias('@images') . '/' . $sub . '/';
             $result_link = str_replace('admin.', '', Url::home(true)) . 'images/' . $sub . '/';
             $file = UploadedFile::getInstanceByName($this->uploadParam);
             $model = new DynamicModel(compact('file'));
             $model->addRule('file', 'image')->validate();

             if ($model->hasErrors()) {
                 $result = ['error' => $model->getFirstError('file')];
             } else {
                 $model->file->name = strtotime('now') . '_' . Yii::$app->getSecurity()->generateRandomString(6).'.'.$model->file->extension;


             }

         }
     }*/

     public function actionIndex()
     {
         $blogs = Blog::find()->all();
         return $this->render('index', ['blogs' => $blogs]);
     }

     /**
      * Login action.
      *
      * @return string
      */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
