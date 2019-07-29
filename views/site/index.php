<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */

$bundle = Yii::$app->assetManager->getBundle(AppAsset::class);

$this->title = Yii::t('app', 'Главная');

?>
<section class="home-start">

    <div class="container">
        <img class="home-start-img" src="<?= $bundle->baseUrl ?>/images/home/start.svg">
    </div>

    <a class="home-start-scroll" href="#header">
        <img src="<?= $bundle->baseUrl ?>/images/home/scroll.svg">
    </a>

    <video class="home-start-bg" autoplay muted loop>
        <source src="<?= $bundle->baseUrl ?>/images/mma_new.mp4" type="video/mp4">
    </video>
</section>

<?= $this->render('@app/views/layouts/components/header') ?>

<main class="home">

    <section class="home-prizes" id="prizes">
        <div class="container">
            <div class="row no-gutters h-100">

                <div class="home-prizes-col-2">
                    <div class="home-prizes-item ronson home-prizes-o2" data-hover="ronson">
                        <div class="ronson-headline">
                            <span class="ronson-sub">Miller Music Amplified</span>
                            <span class="ronson-head">Mark Ronson</span>
                        </div>
                        <div class="ronson-headline ronson-headline-bottom">
                            <span class="ronson-sub"><?=Yii::t('app', 'Ноябрь 2019')?></span>
                            <span class="ronson-sub">Будапешт</span>
                        </div>
                        <img class="home-prizes-img" src="<?= $bundle->baseUrl ?>/images/home/ronson.png">
                    </div>
                </div>

                <div class="home-prizes-col-3">
                    <div class="row no-gutters h-100">
                        <div class="col-md-4 home-prizes-o1">
                            <div class="home-prizes-item hidden" id="ronson">
                                <img class="arrow arrow-left" src="<?= $bundle->baseUrl ?>/images/home/arrow.svg">
                                <span class="home-prizes-item-sub"><?=Yii::t('app', 'Незабываемая')?><br><?=Yii::t('app', 'вечеринка')?></span>
                                <span class="home-prizes-item-head"><?=Yii::t('app', 'В Будапеште')?></span>
                            </div>
                        </div>

                        <div class="col-md-4 home-prizes-o2">
                            <div class="home-prizes-item" data-hover="yandex">
                                <img class="home-prizes-img" src="<?= $bundle->baseUrl ?>/images/home/yandex.png">
                            </div>
                        </div>

                        <div class="col-md-4 home-prizes-o3">
                            <div class="home-prizes-item hidden" id="speaker">
                                <img class="arrow arrow-bottom" src="<?= $bundle->baseUrl ?>/images/home/arrow.svg">
                                <span class="home-prizes-item-sub">20 Bluetooth <?=Yii::t('app', 'Колонок')?></span>
                                <span class="home-prizes-item-head">JBL</span>
                            </div>
                        </div>

                        <div class="col-md-4 home-prizes-o4">
                            <div class="home-prizes-item">
                                <img class="home-prizes-img" src="<?= $bundle->baseUrl ?>/images/home/video_1.jpg">
                            </div>
                        </div>
                        <div class="col-md-4 home-prizes-o5">
                            <div class="home-prizes-item hidden" id="yandex">
                                <img class="arrow arrow-top" src="<?= $bundle->baseUrl ?>/images/home/arrow.svg">
                                <span class="home-prizes-item-sub"><?=Yii::t('app', '1000 подписок на')?></span>
                                <span class="home-prizes-item-head"><?=Yii::t('app', 'Яндекс музыку')?></span>
                            </div>
                        </div>


                        <div class="col-md-4 home-prizes-o6">
                            <div class="home-prizes-item" data-hover="speaker">
                                <img class="home-prizes-img" src="<?= $bundle->baseUrl ?>/images/home/speaker.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row no-gutters h-100">

                <div class="home-prizes-col-3">
                    <div class="row no-gutters h-100">
                        <div class="col-md-4 home-prizes-o7">
                            <div class="home-prizes-item hidden" id="battle">
                                <img class="arrow arrow-bottom" src="<?= $bundle->baseUrl ?>/images/home/arrow.svg">
                                <span class="home-prizes-item-sub"><?=Yii::t('app', 'Уникальное')?><br><?=Yii::t('app', 'впечатления')?></span>
                                <span class="home-prizes-item-head">DJ Battle</span>
                            </div>
                        </div>

                        <div class="col-md-4 home-prizes-o8">
                            <div class="home-prizes-item" data-hover="headphones">
                                <img class="home-prizes-img" src="<?= $bundle->baseUrl ?>/images/home/headphone.png">
                            </div>
                        </div>

                        <div class="col-md-4 home-prizes-o9">
                            <div class="home-prizes-item hidden" id="party">
                                <img class="arrow arrow-right" src="<?= $bundle->baseUrl ?>/images/home/arrow.svg">
                                <span class="home-prizes-item-sub"><?=Yii::t('app', '6 депозитов в бар')?><br><?=Yii::t('app', 'в твоем городе')?></span>
                                <span class="home-prizes-item-head">100 000 тенге</span>
                            </div>
                        </div>

                        <div class="col-md-4 home-prizes-o10">
                            <div class="home-prizes-item" data-hover="battle">
                                <img class="home-prizes-img" src="<?= $bundle->baseUrl ?>/images/home/dj.jpg">
                            </div>
                        </div>

                        <div class="col-md-4 home-prizes-o11">
                            <div class="home-prizes-item hidden" id="headphones">
                                <img class="arrow arrow-top" src="<?= $bundle->baseUrl ?>/images/home/arrow.svg">
                                <span class="home-prizes-item-sub">10 bluetooth <?=Yii::t('app', 'наушников')?></span>
                                <span class="home-prizes-item-head">JBL</span>
                            </div>
                        </div>


                        <div class="col-md-4 home-prizes-o12">
                            <div class="home-prizes-item">
                                <img class="home-prizes-img" src="<?= $bundle->baseUrl ?>/images/home/video_2.jpg">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="home-prizes-col-2">
                    <div class="home-prizes-item bar" data-hover="party">
                        <p class="bar-text"><?=Yii::t('app', 'Депозит в бар')?><br><?=Yii::t('app', 'в твоем городе')?></p>
                        <img class="home-prizes-img" src="<?= $bundle->baseUrl ?>/images/home/bar.jpg">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="home-rules" id="rules">
        <section class="container">
            <span class="home-head"><?=Yii::t('app', 'Получи возможность выиграть')?></span>
            <span class="home-sub mb-4"><?=Yii::t('app', 'Моментальные призы')?></span>
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="home-rules-item">
                        <img class="home-rules-img home-rules-img--big" src="<?= $bundle->baseUrl ?>/images/home/register.svg">
                        <p class="home-rules-lead"><?=Yii::t('app', 'Зарегистрируйся на сайте')?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="home-rules-item">
                        <img class="home-rules-img home-rules-img--big" src="<?= $bundle->baseUrl ?>/images/home/code.svg">
                        <p class="home-rules-lead"><?=Yii::t('app', 'Получи промо-код в&nbsp;баре или&nbsp;найди его&nbsp;в&nbsp;мультипаке')?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="home-rules-item">
                        <img class="home-rules-img home-rules-img--big" src="<?= $bundle->baseUrl ?>/images/home/sms.svg">
                        <p class="home-rules-lead"><?=Yii::t('app', 'Отправь SMS&nbsp;на&nbsp;номер 7102* или&nbsp;введи код&nbsp;в&nbsp;личном кабинете')?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="home-rules-item">
                        <img class="home-rules-img home-rules-img--big" src="<?= $bundle->baseUrl ?>/images/home/gift.svg">
                        <p class="home-rules-lead"><?=Yii::t('app', 'Получи возможность выиграть призы')?></p>
                    </div>
                </div>
            </div>
            <span class="home-sub"><?=Yii::t('app', 'Главный приз')?></span>
            <div class="row">
                <div class="col-md-4">
                    <div class="home-rules-item">
                        <img class="home-rules-img" src="<?= $bundle->baseUrl ?>/images/home/register.svg">
                        <p class="home-rules-lead"><?=Yii::t('app', 'Зарегистрируйся на сайте')?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="home-rules-item">
                        <img class="home-rules-img" src="<?= $bundle->baseUrl ?>/images/home/points.svg">
                        <p class="home-rules-lead"><?=Yii::t('app', 'Накопи 30&nbsp;балов и&nbsp;получи пригласительный на&nbsp;ивент')?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="home-rules-item">
                        <img class="home-rules-img" src="<?= $bundle->baseUrl ?>/images/home/ticket.svg">
                        <p class="home-rules-lead"><?=Yii::t('app', 'Получи возможность выиграть поездку на&nbsp;Miller Music Amplified')?></p>
                    </div>
                </div>
            </div>

            <span class="home-rules-modal"><?=Yii::t('app', 'Подробнее об акции по ')?><a href="#" data-toggle="modal" data-target="#rulesModal"><?=Yii::t('app', 'ссылке')?></a></span>

            <p class="home-rules-help"><?=Yii::t('app', '*стоимость СМС — 7 тенге для абонентов всех сотовых сетей Республики Казахстан. Срок действия акции с 27 июня по 30 августа 2019 года включительно')?></p>

            <div class="modal fade" id="rulesModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title"><?=Yii::t('app', 'Правила участия')?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <?=Yii::t('app', 'Правила')?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <section class="home-insta">
        <section class="container">
            <div class="home-insta-wrap">
                <img class="home-insta-mt" src="<?= $bundle->baseUrl ?>/images/common/mtsign.svg">
                <a class="home-insta-link" href="//instagram.com/explore/tags/millermusicamplified/">#millermusicamplified</a>
            </div>
        </section>
    </section>
</main>

<?= $this->render('@app/views/layouts/components/footer') ?>
