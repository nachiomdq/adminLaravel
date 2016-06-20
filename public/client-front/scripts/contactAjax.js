$("#formContact").on('submit', function(e) {
    e.preventDefault();
    
    $.LoadingOverlay("show", {color:"#00000"});
    $.ajax({
        method: "POST",
        url: urlAPI,
        data: new FormData($('#formContact')[0]),
        processData: false,
        contentType: false,
    }).done(function(response) {
        if (!response.success) {
            $('.envio-fail').fadeIn();
            $('.envio-ok').fadeOut();
            $.LoadingOverlay("hide");
        } else {
            $.LoadingOverlay("hide");
            $('.cold .lista').fadeOut();
            $('.envio-ok').fadeIn();
            $('.envio-fail').fadeOut();

        }

    });
});
