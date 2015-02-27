define(['jquery-nos'], function ($) {

    return function (container) {
        $container = $(container);
        $select = $container.find('.font-select');
        currentIcons = fontsIcons[$select.val()];
        $(container).find('input[type="checkbox"]:checked').prop('checked', false);
        for (symbol in currentIcons) {
            $(container).find('input[type="checkbox"][data-symb-id=' + symbol + ']').prop('checked', true);
        }
    }


});