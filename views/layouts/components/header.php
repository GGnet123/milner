<?php

use app\assets\AppAsset;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */

// $bundle = Yii::$app->assetManager->getBundle(AppAsset::class);
$bundle = AppAsset::register($this);

?>
<header class="header" id="header">
    <div class="container">
        <nav class="header-menu">
            <div class="header-toggler">
                <span class="header-toggler__toggle"></span>
            </div>
            <div class="header-menu-part">
                <a class="header-link" href="../#prizes"><?=Yii::t('app', 'Призы')?></a>
                <a class="header-link" href="<?= Url::to(['site/top']) ?>"><?=Yii::t('app', 'Топ')?></a>
                <a class="header-link" href="../#rules"><?=Yii::t('app', 'Правила')?></a>
                <!-- <a class="header-link" href="<?= Url::to(['site/battle']) ?>">DJ Battle</a> -->
            </div>
            <a class="header-logo" href="<?= Url::home() ?>">
                <img class="header-logo__img" src="<?= $bundle->baseUrl ?>/images/common/logo.png" alt="Miller">
            </a>
            <div class="header-menu-part">
                <a class="header-link user" href="<?= Url::to(['site/login']) ?>"><?=Yii::t('app', 'Мой')?> Miller Music Amplified</a>
                <div class="header-lang">
                    <a class="header-link <?= Yii::$app->language == 'ru-RU' ? "header-link--selected" : ""?>" href="<?=Url::to(['site/change-language'])?>">Рус</a>
                    <a class="header-link <?= Yii::$app->language == 'kk-KZ' ? "header-link--selected" : ""?>" href="<?=Url::to(['site/change-language'])?>">Qaz</a>
                </div>
            </div>
            <a class="header-user" href="<?= Url::to(['site/login']) ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                    <path d="M189 61c0 33.7-27.3 61-61 61S67 94.6 67 61 94.3 0 128 0 189 27.3 189 61zM249.3 256c-6.1-61.6-58.1-109.7-121.3-109.7S12.8 194.4 6.7 256H249.3z"/>
                </svg>
            </a>
        </nav>
    </div>
</header>
