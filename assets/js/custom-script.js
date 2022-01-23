$(document).ready(function () {
    $('#specialist').change(function () {
        var value = $(this).val();
        $.ajax({
            url: baseurl + 'home/appointspecialist',
            method: 'POST',
            type: 'text',
            data: {'skill': value},
            success: function (result) {
                $("#doctorlist").html(result);
            }
        });
    });
});