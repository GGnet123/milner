<?php

use app\assets\AppAsset;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */

// $bundle = Yii::$app->assetManager->getBundle(AppAsset::class);
$bundle = AppAsset::register($this);

$this->title = Yii::t('app', 'Регистрация');

?>

<main class="signup">
    <section class="container">
        <section class="row justify-content-center">
            <section class="col-md-4">
                <form class="signup-form" method="post">
                    <img class="signup-logo" src="<?= $bundle->baseUrl ?>/images/common/logo.png"
                         alt="Miller Music Amplified">

                    <div class="signup-controls">
                        <a class="signup-controls-link" href="/login"><?=Yii::t('app', 'Вход')?></a>
                        <span class="signup-controls-divider">/</span>
                        <span class="signup-controls-current"><?=Yii::t('app', 'Регистрация')?></span>
                    </div>

                    <div class="signup-form-item">
                        <label class="signup-form-item-label" for="name"><?=Yii::t('app', 'Имя')?></label>
                        <input class="signup-form-item-input" name="name" type="text" required>
                    </div>

                    <div class="signup-form-item">
                        <label class="signup-form-item-label" for="city"><?=Yii::t('app', 'Город')?></label>
                        <select class="age-select" required name="city" style="width: 100%">
                            <option value="Алматы" selected><?=Yii::t('app', 'Алматы')?></option>
                            <option value="Нур-Султан"><?=Yii::t('app', 'Нур-Султан')?></option>
                            <option value="Караганда"><?=Yii::t('app', 'Караганда')?></option>
                        </select>
                    </div>

                    <div class="signup-form-item">
                        <label class="signup-form-item-label" for="phone"><?=Yii::t('app', 'Номер телефона')?></label>
                        <input class="signup-form-item-input" type="text" name="phone"
                               data-inputmask="'mask': '+7(799) 999-99-99'" required>
                    </div>

                    <div class="signup-form-item">
                        <label class="signup-form-item-label" for="phone"><?=Yii::t('app', 'Электропочта')?></label>
                        <input class="signup-form-item-input" type="email" name="email" required>
                    </div>

                    <div class="signup-form-item">
                        <label class="signup-form-item-label"><?=Yii::t('app', 'Пол')?></label>
                        <!--                        <input id='select' class="gender" type="radio" name="gender" value="male">Male<br>-->
                        <!--                        <input id='select' class="gender" type="radio" name="gender" value="female">Female<br>-->
                        <select id='select' class="gender signup-form-item-input" name="gender" required>
                            <option value="male" name="gender"><?=Yii::t('app', 'Мужской')?></option>
                            <option value="female" name="gender"><?=Yii::t('app', 'Женский')?></option>
                        </select>
                    </div>

                    <div class="signup-form-item">
                        <label class="signup-form-item-label" for="phone"><?=Yii::t('app', 'Пароль')?></label>
                        <input class="signup-form-item-input" type="password" name="password" required>
                    </div>

                    <input type="hidden" name="ref" value="<?= $ref_id ?>">

                    <button class="signup-form-btn" type="submit" name="button"><?=Yii::t('app', 'Зарегистрироваться')?></button>
                </form>
            </section>
        </section>
    </section>
</main>
