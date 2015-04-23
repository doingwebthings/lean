jQuery(document).ready(function ($) {
    console.log('jQuery is ready!');

    //send ajax form-request
    $('#contactform').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: url.ajax,
            data: {
                action: 'contactform',
                cname: $('#cname').val(),
                cemail: $('#cemail').val(),
                cfirma: $('#cfirm').val(),
                cnachricht: $('#cmessage').val(),
                email: $('#email').val(),
                mailcopy: $('#mailcopy:checked').val(),
                nonce: $('#_form_nonce').val()
            },
            cache: false,
            success: function (data) {
                $('#cname').val('');
                $('#cemail').val('');
                $('#cfirm').val('');
                $('#cmessage').val('');
                $('#email').val('');
                $('#malcopy').val('');

                $('.alert-success').removeClass('hidden');
            }

        });

        return false;

    });
});
