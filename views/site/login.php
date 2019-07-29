<?php

use app\assets\AppAsset;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */

// $bundle = Yii::$app->assetManager->getBundle(AppAsset::class);
$bundle = AppAsset::register($this);

$this->title = Yii::t('app', 'Вход');
?>

<main class="login">
    <section class="container">
        <section class="row justify-content-center">
            <section class="col-md-4">
                <form class="login-form" method="post">
                    <img class="login-logo" src="<?= $bundle->baseUrl ?>/images/common/logo.png" alt="Miller Music Amplified">

                    <div class="login-controls">
                        <span class="login-controls-current"><?=Yii::t('app', 'Вход')?></span>
                        <span class="login-controls-divider">/</span>
                        <a class="login-controls-link" href="/signup"><?=Yii::t('app', 'Регистрация')?></a>
                    </div>

                    <div class="login-form-item">
                        <label class="login-form-item-label" for="phone"><?=Yii::t('app', 'Телефон')?></label>
                        <input class="login-form-item-input" type="text" name="phone" data-inputmask="'mask': '+7(799) 999-99-99'" required>
                    </div>
                    <div class="login-form-item">
                        <label class="login-form-item-label" for="phone"><?=Yii::t('app', 'Пароль')?></label>
                        <input class="login-form-item-input" type="password" name="password" required>
                    </div>

                    <button class="login-form-btn" type="submit" name="button"><?=Yii::t('app', 'Войти')?></button>
                </form>

            </section>
        </section>
    </section>
</main>
