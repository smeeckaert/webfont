<?php
$id = uniqid('webfont');
/**
 * @var \Dev\Webfont\Model_Symbol $symbols
 * @var \Dev\Webfont\Model_Font   $fonts
 */
$currentFolder = null;

$fontIcons = array();

?>
<link rel="stylesheet" href="static/apps/webfont/css/normalize.css">
<link rel="stylesheet" href="static/apps/webfont/css/foundation.min.css">
<link rel="stylesheet" href="static/apps/webfont/css/webfont.css">
<div id="<?= $id ?>" class="webfont">

    <div class="selector">
        <?php

        if (!empty($fonts)) {
            ?>
            <select name="font-select" class="font-select">
                <?php
                foreach ($fonts as $font) {
                    /** @var \Dev\Webfont\Model_Font $font */
                    $fontIcons[$font->font_id] = array();
                    foreach ($font->font_symbol as $fontSymbol) {
                        /** @var \Dev\Webfont\Model_Font_Symbol $fontSymbol */
                        $fontIcons[$font->font_id][$fontSymbol->symbol->symb_id] = $fontSymbol->fosy_character;
                    }
                    ?>
                    <option value="<?= $font->font_id ?>"><?= $font->font_name ?></option>
                <?php
                }
                ?>
            </select>
            <script language="text/javascript">
                var fontsIcons = <?= json_encode($fontIcons)?>;
            </script>
        <?php
        }

        ?>
        <form action="admin/webfont/new">
            <label for="new_font_name"><?= __('Create new font') ?></label>
            <input type="text" placeholder="<?= __('Font name') ?>" name="name" id="new_font_name">
            <input type="submit">
        </form>

        <?= count($symbols) ?> <?= __('Symbols available') ?>
        <button class="import-font">Re-import symbols</button>
    </div>
    <?php
    // Doesn't show symbols if we don't have a font
    if (empty($fonts)) {
        return;
    }
    ?>
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
                <input type="checkbox" id="<?= $cbxId ?>" data-symb-id="<?= $symbol->symb_id ?>">
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
    require(['jquery-nos'], function ($) {
        require(['static/apps/webfont/js/update.js'], function (update) {
            $(function () {
                update(<?=$id?>);
                $(<?=$id?>).find('.font-select').bind('change', function () {
                    update(<?= $id?>);
                })
            });
        });
    });
    require(['jquery-nos'], function ($) {
        require(['static/apps/webfont/js/select.js'], function (select) {
            $(function () {
                $('.symbol-list input[type="checkbox"]').bind('change', function () {
                    select(<?=$id?>, $(this));
                })

            });
        });
    });
</script>