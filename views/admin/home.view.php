<?php
$id = uniqid('webfont');
/**
 * @var \Dev\Webfont\Model_Symbol $symbols
 * @var \Dev\Webfont\Model_Font   $fonts
 */

?>
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