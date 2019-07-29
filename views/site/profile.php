<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */

$bundle = Yii::$app->assetManager->getBundle(AppAsset::class);

$this->title = 'Профиль';
$this->registerJsFile('/scripts/main.js', ['depends' => ['yii\web\JqueryAsset']])
?>
<?php if (isset($_GET['instagram-check'])) { ?>
    <?php if ($_GET['instagram-check'] == 'true') { ?>
        test
    <?php } else { ?>
        lol
    <?php } ?>
<?php } ?>
<main class="profile">
    <section class="container">
        <div class="profile-headline">
            <h1 class="profile-head">Мой Miller Music Amplified</h1>
            <a class="profile-btn" href="/logout"><?=Yii::t('app', 'Выйти')?></a>
        </div>

        <div class="profile-user">
            <div class="profile-user-item">
                <span class="profile-user-sub"><?=Yii::t('app', 'Ты вошел как')?></span>
                <span class="profile-user-head"><?= $model['user_firstname'] ?></span>
            </div>
            <div class="profile-user-item">
                <span class="profile-user-sub"><?=Yii::t('app', 'Твой номер телефона')?></span>
                <span class="profile-user-head"><?= $model->user_phone ?></span>
            </div>
            <div class="profile-user-item">
                <span class="profile-user-sub"><?=Yii::t('app', 'Ты накопил')?></span>
                <span class="profile-user-badge"><?= $model->user_points ?? 0 ?></span>
            </div>
        </div>

        <div class="profile-register">
            <span class="profile-register-head"><?=Yii::t('app', 'Регистрация кода')?></span>
            <span class="profile-register-sub"><?=Yii::t('app', 'Ты получишь 1 балл за регистрацию кода из бара и 2 балла за код из мультипака')?></span>

            <form class="profile-register-form" action="/site/registercode" method="get" id="profile-register-form">
                <input class="profile-register-input" type="text" id="code" data-inputmask="'mask': '****-****'"
                       name="code">
                <a href="<?php echo \yii\helpers\Url::to(['site/registercode']) ?>"
                   class="profile-register-btn coderegbtn"><?=Yii::t('app', 'Зарегистрировать')?></a>
            </form>
        </div>

        <div class="profile-dop">
            <span class="profile-dop-head"><?=Yii::t('app', 'Лёгкий способ')?></span>
            <span class="profile-dop-sub"><?=Yii::t('app', 'Заработать дополнительные баллы')?></span>
        </div>

        <div class="profile-referal">
            <span class="profile-referal-head"><?=Yii::t('app', '3 балла за 5 друзей')?></span>
            <span class="profile-referal-sub"><?=Yii::t('app', 'Пригласи друзей с помощью ссылки и получи 3 балла')?></span>

            <form class="profile-referal-form">
                <input class="profile-referal-input" id="referal" type="text"
                       value="<?= Url::to(['site/signup', 'ref' => $model->id], true) ?>" readonly="readonly">
                <button class="profile-referal-btn btn-clipboard" type="button" data-clipboard-target="#referal">
                    Скопировать
                </button>
            </form>
        </div>

        <div class="profile-insta" style="display: none;">
            <span class="profile-insta-head"><?=Yii::t('app', '3 балла за фото в Instagram или Facebook')?></span>
            <span class="profile-insta-sub"><?=Yii::t('app', 'Загрузи фото в форму ниже, скачай фото с рамкой и размести у себя на странице и получи 3 балла')?></span>

            <div class="profile-insta-step" id="profile-insta-step-one">
                <span class="profile-insta-step-head"><?=Yii::t('app', 'Шаг №1')?></span>
                <span class="profile-insta-step-sub"><?=Yii::t('app', 'Загрузите фото из бара Miller')?></span>

                <input id="inst-image" class="profile-insta-step-btn" type="file" title="Выберите файл">Обзор..</input>
            </div>

            <div class="profile-insta-step" id="profile-insta-step-two" style="display: none;">
                <span class="profile-insta-step-head"><?=Yii::t('app', 'Шаг №2')?></span>
                <span class="profile-insta-step-sub"><?=Yii::t('app', 'Скачайте фото с рамкой Miller')?></span>

                <div class="image">
                    <img src="" alt="" id="new-inst-image">
                </div>

                <textarea class="profile-insta-step-textarea" id="hashtags" name="name" rows="8" cols="80"
                          readonly="readonly">
                    #miller #millermusicamplified #genuinedraft
                </textarea>

                <button class="profile-insta-step-btn btn-clipboard" type="button" data-clipboard-target="#hashtags">
                    <?=Yii::t('app', 'Скопировать')?>
                </button>

                <button id="profile-insta-step-btn-two" class="profile-insta-step-btn" type="button"><?=Yii::t('app', 'Дальше')?></button>
            </div>

            <div class="profile-insta-step" style="display: none;" id="profile-insta-step-three">
                <span class="profile-insta-step-head"<?=Yii::t('app', 'Шаг №3')?>></span>
                <span class="profile-insta-step-sub"></span>

                <form action="<?= Url::to(['site/inst-check']) ?>" method="post">
                    <input class="profile-insta-step-input" type="text" name="link">

                    <button class="profile-insta-step-btn" type="submit"><?=Yii::t('app', 'Проверить')?></button>
                </form>
            </div>

        </div>
    </section>
</main>
