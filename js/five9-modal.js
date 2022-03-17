jQuery(function ($) {
    $(function () {
        $('.five9-modal__trigger').click(function (event) {
            event.preventDefault();
            $('#five9-maximize-button').trigger('click');
        });
    });
});
