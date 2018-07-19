jQuery(document).ready(function () {

    $('#preview').click(function () {
        $('#prev_user_name').html($('#user_name').val());
        $('#prev_email').html($('#email').val());
        $('#prev_text').html($('#text').val());
        $('#preview_card').show();

        return false;
    });
});
