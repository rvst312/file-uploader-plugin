jQuery(document).ready(function ($) {
    $('.change-view-button').on('click', function () {
        var view = $(this).data('view');

        $.ajax({
            type: 'POST',
            url: admin_ajax_url,
            data: {
                action: 'change_view',
                view: view,
            },
            success: function (response) {
                $('#adminmenumain').html(response);
            },
        });
    });
});