<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-body mycards">
                            <?= form_open_multipart('action/test'); ?>
                            <div class="form-group">
                                <label>Thumbnail *<span class="text-red"> [1 image & size will be 100x100]</span></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" onchange="imgupload(this)" name="thumbnail" class="custom-file-input">
                                        <label class="custom-file-label imglabel">Choose Thumbnail</label>
                                        <label style="margin-right:60px;"><img id="uploadedfile" src="#" alt="&nbsp;" style="height:34px;margin-top:8px"/></label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    
                                </div>
                            </div>
                            <div class="float-left">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function imgupload(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#uploadedfile').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>