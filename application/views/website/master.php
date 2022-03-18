
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		echo $main_css;
		if($custume_css != NULL){
			echo $custume_css;
		}
	?>
</head>

<body>
	<div class="body-inner">
		<?php echo $header_menu; ?>
		<?php echo $content;?>
		<?php echo $footer; ?>
	</div>
	 <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
	 <?php echo $main_js; ?>
	 <?php if($custume_js != NULL){
		 echo $custume_js;
	 }?>
</body>

</html>
