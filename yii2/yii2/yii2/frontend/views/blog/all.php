<?php
/**
 * Created by PhpStorm.
 * User: qwert
 * Date: 07/11/2018
 * Time: 01:23 AM
 */
?>
<div>
    <?php foreach ($blogs as $one): ?>
        <div>
            <h2>
                <?= $one->title ?>
            </h2>
             <?= $one->text ?>

            <?= \yii\bootstrap\Html::a("Podrobnei", ['blog/one', 'url' => $one->url], ['class' => 'btn btn-success']) ?>
        </div>
    <?php endforeach; ?>

</div>