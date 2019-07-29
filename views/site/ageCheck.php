<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */

$bundle = Yii::$app->assetManager->getBundle(AppAsset::class);

$this->title = Yii::t('app', 'Подтверди свой возраст и город');

?>
<main class="age">
    <section class="container">
        <section class="row justify-content-center">
            <section class="col-md-5">
                <form class="age-form" method="post">
                    <img class="age-logo" src="<?= $bundle->baseUrl ?>/images/common/logo.png" alt="Miller">

                    <span class="age-head"><?=Yii::t('app', 'Добро пожаловать')?></span>
                    <span class="age-sub"><?=Yii::t('app', 'Пожалуйста выберите ваш город и введите свой возраст')?></span>

                    <select class="age-select" required>
                        <option value="almaty" selected>Алматы</option>
                        <option value="nursultan">Нур-Султан</option>
                        <option value="karaganda">Караганда</option>
                    </select>

                    <div class="age-date">
                        <input class="age-input" type="number" maxlength="2" name="day" placeholder="ДД" required>
                        <input class="age-input" type="number" name="month" placeholder="ММ" required>
                        <input class="age-input age-input--long" type="number" name="year" placeholder="ГГГГ" required>
                    </div>

                    <button class="age-btn" type="submit" name="button"><?=Yii::t('app', 'Подтвердить')?></button>

                    <span class="age-help"><?=Yii::t('app', 'Продолжая использование сайта вы даёте ')?><a class="age-help-link" href="#"><?=Yii::t('app', 'согласие')?></a> <?=Yii::t('app', 'на сбор и обработку ваших данных')?></span>
                </form>

            </section>
        </section>
    </section>
</main>
