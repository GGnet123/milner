<main class="top">
    <section class="container">
        <h1 class="top-head"><?=Yii::t('app', 'Топ участников')?></h1>

        <div class="top-table">
            <?php foreach ($winners as $key => $winner) { ?>
                <div class="top-table-row">
                    <span class="top-table-place gold"><?=$key + 1?></span>
                    <div class="top-table-user">
                        <span class="top-table-name"><?=$winner['firstname']?></span>
                        <span class="top-table-phone"><?=$winner['user_phone']?></span>
                    </div>
                    <span class="top-table-points"><?=$winner['current_points']?> балл(ов)</span>
                </div>
            <?php } ?>

        </div>
    </section>
</main>
