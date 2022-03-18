<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
$(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
     $(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
</script>

<script type="text/javascript">

	<?php if($this->session->flashdata('success')){ ?>
		toastr.success("<?php echo $this->session->flashdata('success'); ?>");
	<?php }else if($this->session->flashdata('error')){  ?>
  <?php
	  $msg = $this->session->flashdata('error');
  ?>
		toastr.error("<?php echo is_array($msg) ? $msg[0] : $msg; ?>");
	<?php }else if($this->session->flashdata('warning')){
		$msg = $this->session->flashdata('warning');
	?>
		toastr.warning("<?php echo is_array($msg) ? $msg[0] : $msg; ?>");
	<?php }else if($this->session->flashdata('info')){  ?>
		toastr.info("<?php echo $this->session->flashdata('info'); ?>");
	<?php } ?>

</script>
