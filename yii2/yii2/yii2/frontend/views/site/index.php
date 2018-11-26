<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">
        <?php foreach ($blogs

        as $one):?>
        <h3> <?= $one->title ?> <h3>
                <?= $one->title ?>
                <?php endforeach; ?>
    </div>
</div>
