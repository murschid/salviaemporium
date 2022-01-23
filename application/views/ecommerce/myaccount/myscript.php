<script type="text/javascript">
    function addtowish(id) {
        if (loggedid !== '') {
            var size = $('#myformcntrl').val();
            var color = $("input[class='prcolor_" + id + "']:checked").val();
            if (color == null || color == 'undefined') {
                color = 'None';
            }
            $.ajax({
                url: baseurl + 'customer/wishlist',
                method: 'POST',
                type: 'text',
                data: {'product_id': id, 'size': size, 'color': color},
                success: function (result) {
                    console.log(result);
                    window.location.reload();
                }
            });
        } else {
            $('.errortoast').toast({delay: 5000});
            $('.errortoast').toast('show');
            return false;
        }
    }
    $(window).on('load', function () {
        $('.logpreloader').fadeOut('slow');
    });
</script>
