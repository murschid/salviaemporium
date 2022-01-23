<?php $settings = crypt::settings($this->session->userdata('adminauth')['user']); ?>
<aside class="control-sidebar control-sidebar-light">
    <div class="p-3 row justify-content-center">
        <label><h5>Admin Settings</h5><hr></label>
        <label>Reloading</label>
        <div class="col-sm-10 col-offset-2">
            <div class="form-group">
                <select class="custom-select noradious" onchange="refreshstn($(this).val())">
                    <option value="0" <?= $settings->duration == '0' ? 'selected' : ''; ?>>OFF</option>
                    <option value="60" <?= $settings->duration == '60' ? 'selected' : ''; ?>>01 MIN</option>
                    <option value="300" <?= $settings->duration == '300' ? 'selected' : ''; ?>>05 MIN</option>
                    <option value="600" <?= $settings->duration == '600' ? 'selected' : ''; ?>>10 MIN</option>
                    <option value="900" <?= $settings->duration == '900' ? 'selected' : ''; ?>>15 MIN</option>
                </select>
            </div>
        </div>
        <label>Maps ON/OFF</label>
        <div class="col-sm-10 col-offset-2">
            <div class="form-group">
                <select class="custom-select noradious" onchange="maponoff($(this).val())">
                    <option value="1" <?= $settings->maps == '1' ? 'selected' : ''; ?>>ON</option>
                    <option value="0" <?= $settings->maps == '0' ? 'selected' : ''; ?>>OFF</option>
                </select>
            </div>
        </div>
    </div>
</aside>

<script type="text/javascript">
    function refreshstn(value) {
        $.ajax({
            url: baseurl + 'action/refreshupdate',
            method: 'POST',
            type: 'html',
            data: {'duration': value},
            success: function (result) {
                console.log(result);
                window.location.reload();
            }
        });
    }

    function maponoff(value) {
        $.ajax({
            url: baseurl + 'action/maponoff',
            method: 'POST',
            type: 'html',
            data: {'maps': value},
            success: function (result) {
                console.log(result);
                window.location.reload();
            }
        });
    }
</script>