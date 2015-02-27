<?php
$id = uniqid('webfont');
/**
 * @var \Dev\Webfont\Model_Symbol $symbols
 * @var \Dev\Webfont\Model_Font   $fonts
 */
$currentFolder = null;
?>
<link rel="stylesheet" href="static/apps/webfont/css/normalize.css">
<link rel="stylesheet" href="static/apps/webfont/css/foundation.min.css">
<link rel="stylesheet" href="static/apps/webfont/css/webfont.css">
<div id="<?= $id ?>" class="webfont">

    <div class="selector">
        <form action="admin/webfont/new">
            <label for="new_font_name"><?= __('Create new font') ?></label>
            <input type="text" placeholder="<?= __('Font name') ?>" name="name" id="new_font_name">
            <input type="submit">
        </form>

        <?= count($symbols) ?> <?= __('Symbols available') ?>
        <button class="import-font">Re-import symbols</button>
    </div>
    <div class="symbol-list">
        <?php

        foreach ($symbols as $symbol) {
            /**
             * @var \Dev\Webfont\Model_Symbol $symbol
             */
            if ($symbol->symb_folder != $currentFolder) {
                if (!empty($currentFolder)) {
                    echo "</ul>";
                }
                $currentFolder = $symbol->symb_folder;
                echo '<h1>' . $symbol->symb_folder . '</h1>';
                echo '<ul class="small-block-grid-12">';
            }
            $cbxId = "icon-" . $symbol->symb_id;
            ?>
            <li>
                <input type="checkbox" id="<?= $cbxId ?>">
                <label for="<?= $cbxId ?>">
                    <div class="symbol">
                        <?= $symbol->display(); ?>
                    </div>
                </label>
            </li>
        <?php
        }

        ?>

    </div>
</div>

<script type="text/javascript">
    require(['jquery-nos'], function ($) {
        require(['static/apps/webfont/js/webfont.js'], function (init) {
            $(function () {
                init(<?=$id?>);
            });
        });
    });
</script>