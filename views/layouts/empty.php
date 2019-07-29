<?php

use yii\helpers\Html;
use app\assets\AppAsset;


/* @var $this \yii\web\View */
/* @var $content string */

$bundle = AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>" dir="ltr">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WNZ9XB6');</script>
    <!-- End Google Tag Manager -->
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge; chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title><?= Html::encode($this->title) ?> · Miller Music Amplified</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $bundle->baseUrl ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $bundle->baseUrl ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $bundle->baseUrl ?>/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="194x194" href="<?= $bundle->baseUrl ?>/favicon-194x194.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= $bundle->baseUrl ?>/android-chrome-192x192.png">
    <link rel="manifest" href="<?= $bundle->baseUrl ?>/site.webmanifest">
    <link rel="mask-icon" href="<?= $bundle->baseUrl ?>/safari-pinned-tab.svg" color="#995a9d">
    <meta name="msapplication-TileColor" content="#995a9d">
    <meta name="msapplication-TileImage" content="<?= $bundle->baseUrl ?>/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="google" value="notranslate">
    <meta http-equiv="cleartype" content="on">
    <meta name="skype_toolbar" content="skype_toolbar_parser_compatible">
    <meta name="msapplication-tap-highlight" content="no">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WNZ9XB6"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?php $this->beginBody() ?>
    <?= $content ?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
