define(['jquery-nos'], function ($) {

    return function (container) {
        $container = $(container);
        $container.find('form').bind('submit', function () {
            $this = $(this);
            console.log($this);

            action = $this.attr('action');
            fields = $this.find(":input").serializeArray();
            console.log(fields);
            data = {};
            jQuery.each(fields, function (i, field) {
                data[field.name] = field.value;
            });
            $container.nosAjax({
                type: 'POST',
                data: data,
                url : action
            });
            return false;
        });

    }


});