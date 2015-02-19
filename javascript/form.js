$(function () {
    $(".btn-info").click(function () {
        $(".extremum-slide").hide();
        $(this).siblings(".extremum-slide").slideToggle();
    });
});

//обработка форм
$(function () {
    $('#form').submit(function (event) {
        var form = $(this);
        event.preventDefault();
        $.ajax({
            url: window.location.href,
            data: form.serializeArray(),
            type: 'POST',
            success: function (data) {
                var url = data.locationUrl || window.location.href;
                if (data.indexOf('alert-warning') >= 0) {
                    $(data).prependTo(form.parent());
                    form.remove();
                } else {
                    window.location.href = url;
                }
            }
        })
    });
});