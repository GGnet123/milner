<?php

use app\assets\AppAsset;
use yii\web\View;

/* @var $this View */

// $bundle = Yii::$app->assetManager->getBundle(AppAsset::class);
$bundle = AppAsset::register($this);

?>

<footer class="footer">
    <div class="container">
        <div class="footer-wrap">
            <img class="footer-logo" src="<?= $bundle->baseUrl ?>/images/common/logo.png" alt="Miller logo">

            <div class="footer-links">
                <span class="footer-head">Присоединяйся:</span>
                <a class="footer-link" href="https://www.instagram.com/millergenuinedraft_kz/" target="_blank" rel="nofollow">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                        <path d="M191.7 54.5c7.5 0 13.6 6.1 13.6 13.6 0 7.5-6.1 13.6-13.6 13.6 -7.5 0-13.6-6.1-13.6-13.6C178.1 60.6 184.2 54.5 191.7 54.5zM128 67c33.7 0 61 27.3 61 61 0 33.7-27.3 61-61 61s-61-27.3-61-61C67 94.3 94.3 67 128 67zM128 167c21.5 0 39.1-17.5 39.1-39.1 0-21.5-17.5-39-39.1-39s-39.1 17.5-39.1 39C88.9 149.5 106.5 167 128 167zM177.3 0C220.7 0 256 35.3 256 78.7v98.7c0 43.4-35.3 78.7-78.7 78.7H78.7C35.3 256 0 220.7 0 177.3V78.7C0 35.3 35.3 0 78.7 0H177.3zM234.1 177.3V78.7c0-31.3-25.4-56.7-56.7-56.7H78.7c-31.3 0-56.7 25.4-56.7 56.7v98.7c0 31.3 25.4 56.7 56.7 56.7h98.7C208.6 234.1 234.1 208.6 234.1 177.3z"></path>
                    </svg>
                </a>
                <a class="footer-link" href="https://www.facebook.com/MillerKazakhstan/" target="_blank" rel="nofollow">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                        <path d="M201.9 0H54.1C24.3 0 0 24.3 0 54.2v147.7C0 231.7 24.3 256 54.1 256h147.7c29.9 0 54.1-24.3 54.1-54.1V54.2C256 24.3 231.7 0 201.9 0zM234.1 201.9c0 17.8-14.5 32.2-32.2 32.2h-37.7v-75H193l4.3-33.5h-33.2v-21.4c0-9.7 2.7-16.3 16.6-16.3l17.8 0v-30c-3.1-0.4-13.6-1.3-25.9-1.3 -25.6 0-43.1 15.6-43.1 44.3v24.7h-28.9V159h28.9v75H54.1c-17.8 0-32.2-14.4-32.2-32.2V54.2c0-17.8 14.4-32.2 32.2-32.2h147.7c17.8 0 32.2 14.5 32.2 32.2V201.9z"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>
