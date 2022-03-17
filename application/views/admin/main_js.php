<!-- Bootstrap core JavaScript-->
<script src="<?php echo $this->config->item('admin_source'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo $this->config->item('admin_source'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo $this->config->item('admin_source'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo $this->config->item('admin_source'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo $this->config->item('admin_source'); ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo $this->config->item('admin_source'); ?>js/demo/chart-area-demo.js"></script>
<script src="<?php echo $this->config->item('admin_source'); ?>js/demo/chart-pie-demo.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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
