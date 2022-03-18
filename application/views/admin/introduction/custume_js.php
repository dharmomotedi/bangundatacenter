<?php
	 foreach ($data['introduction'] as $key_list => $item_list) {
 ?>
<script>
	function readURL<?php echo $item_list['text_id']; ?>(input) {
	  if (input.files && input.files[0]) {
	    var reader<?php echo $item_list['text_id']; ?> = new FileReader();

	    reader<?php echo $item_list['text_id']; ?>.onload = function(e) {
	      $('#blah-<?php echo $item_list['text_id']; ?>').attr('src', e.target.result);
	    }

	    reader<?php echo $item_list['text_id']; ?>.readAsDataURL(input.files[0]); // convert to base64 string
	  }
	}

	$("#imgInp-<?php echo $item_list['text_id']; ?>").change(function() {
	  readURL<?php echo $item_list['text_id']; ?>(this);
	});
</script>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input-<?php echo $item_list['text_id']; ?>").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label-<?php echo $item_list['text_id']; ?>").addClass("selected").html(fileName);
});
</script>
<?php
		}
?>
