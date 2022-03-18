<!DOCTYPE html>
<html dir="ltr" lang="en-US">
	<head>
		<?php
			echo $main_css;
			if($custume_css != NULL){
				echo $custume_css;
			}
		?>
	</head>

	<?php
			if(!isset($_SESSION['admin_id']))
			{
	?>
	<body class="bg-gradient-success">
				<?php echo $content; ?>
				<?php echo $main_js; ?>
	</body>
	<?php
			}else{
	?>
	<body id="page-top">
		<div id="wrapper">
			<?php echo $side_menu; ?>
			 <div id="content-wrapper" class="d-flex flex-column">
				   <div id="content">
						 	<?php echo $header_menu; ?>
							<?php echo $content; ?>
					 </div>
					 	<?php echo $footer; ?>
			 </div>
		</div>
		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
				<i class="fas fa-angle-up"></i>
		</a>

		<!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo base_url()?>Admin/Logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

		<?php echo $main_js; ?>
		<?php if($custume_js != NULL){
			echo $custume_js;
		}
		?>
	</body>
	<?php
			}
	?>



</html>
