define(['jquery-nos'], function ($) {

    return function (container) {
        $container = $(container);
        $select = $container.find('.font-select');
        currentIcons = fontsIcons[$select.val()];
    }


});