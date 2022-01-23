<div class="modal fade" id="proimgmod" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Profile Photo (128x128) px</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('customer/prophotoupdate'); ?>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <img id="uploadedimg" src="#" alt="&nbsp;" style="height:34px;margin:0 5px;z-index:9;">
                        <input type="file" onchange="readURL(this)" name="cusproimg" class="custom-file-input proimgcls">
                        <label class="custom-file-label">&nbsp;</label>
                    </div>
                </div>
                <input type="hidden" name="customerid" value="<?= $customer->id; ?>">
                <button type="submit" class="btn btn-sm btn-secondary float-right">Upload</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.btn').prop('disabled', true);
        $('.btn').css('cursor', 'not-allowed');
        $('#cuproimg').mouseover(function () {
            $('.imgchng').show(100);
        });
        $('#cuproimg').mouseout(function () {
            $('.imgchng').hide(100);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#uploadedimg').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            $('.btn').css('cursor', 'pointer');
            $('.btn').prop('disabled', false);
        }
    }
</script>