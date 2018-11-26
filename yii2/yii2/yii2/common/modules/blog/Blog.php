<?php

namespace common\modules\blog;

/**
 * blog module definition class
 */
class Blog extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'common\modules\blog\controllers';
    public $defaultRoute = 'common\modules\blog\models\Blog';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
