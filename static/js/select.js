define(['jquery-nos'], function ($) {

    return function (container, item) {
        $container = $(container);
        $select = $container.find('.font-select');
        fontId = $select.val();
        checked = item.is(":checked");
        symbId = item.attr('data-symb-id');
        data = {id: symbId, status: checked, font: fontId};
        if (checked) {
            fontsIcons[fontId][symbId] = 'new';
        } else {
            delete fontsIcons[fontId][symbId];
        }
        $container.nosAjax({
            type   : 'POST',
            data   : data,
            url    : "admin/webfont/select"
        });
    }


});