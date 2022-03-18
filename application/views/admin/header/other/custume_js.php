<?php
	 foreach ($data['header_other'] as $key_list => $item_list) {
 ?>
<script>
	function readURL<?php echo $item_list['header_id']; ?>(input) {
	  if (input.files && input.files[0]) {
	    var reader<?php echo $item_list['header_id']; ?> = new FileReader();

	    reader<?php echo $item_list['header_id']; ?>.onload = function(e) {
	      $('#blah-<?php echo $item_list['header_id']; ?>').attr('src', e.target.result);
	    }

	    reader<?php echo $item_list['header_id']; ?>.readAsDataURL(input.files[0]); // convert to base64 string
	  }
	}

	$("#imgInp-<?php echo $item_list['header_id']; ?>").change(function() {
	  readURL<?php echo $item_list['header_id']; ?>(this);
	});
</script>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input-<?php echo $item_list['header_id']; ?>").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label-<?php echo $item_list['header_id']; ?>").addClass("selected").html(fileName);
});
</script>
<?php
		}
?>
