<div class="mytoast" aria-live="polite" aria-atomic="true">
    <div class="toast phptoast" data-autohide="true" style="background-color:<?= $this->session->flashdata('toastclr'); ?>">
        <div class="toast-header">
            <i class="fa fa-bell"></i>&nbsp;<strong class="mr-auto">Notification</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body"><?= $this->session->flashdata('toast'); ?></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.phptoast').toast({delay: 5000});
        $('.phptoast').toast('show');
    });
</script>