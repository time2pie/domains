<?php
/**
 * Created by PhpStorm.
 * User: qwert
 * Date: 16/11/2018
 * Time: 01:31 AM
 */

namespace common\components\behaviors;


use yii\base\Behavior;

class StatusBehavior extends Behavior
{
    public static function getStatusList()
    {
        return ['off', 'on'];

    }

    public function getStatusName()
    {
        $list = $this->owner->getStatusList();
        return $list[$this->owner->status_id];
    }
    public function events()
    {
        return[

        ];
    }
}