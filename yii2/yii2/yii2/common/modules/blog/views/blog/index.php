<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BlogS */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Blog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'text:ntext',
            ['attribute' => 'url', 'format' => 'url'],
            ['attribute' => 'status_id', 'filter' => ['off', 'on']],
            'sort',
            'date_create',
            'date_update',
            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    "check" => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-check"></i>', 'http://Catze.eu/titanbreaker.php');
                    }
                ],
                'visibleButtons' => [
                    'check' => function ($model, $key, $url) {
                        return $model->status_id == 1;
                    }],
                'template' => '{view} {update} {delete} {check}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
