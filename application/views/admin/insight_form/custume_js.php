<!-- Page level plugins -->
<script src="<?php echo $this->config->item('admin_source'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $this->config->item('admin_source'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo $this->config->item('admin_source'); ?>js/demo/datatables-demo.js"></script>
<script src="<?php echo $this->config->item('admin_source'); ?>plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('admin_source'); ?>plugins/tinymce/tinymce.min.js"></script>

<script>
	function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	      $('#blah').attr('src', e.target.result);
	    }

	    reader.readAsDataURL(input.files[0]); // convert to base64 string
	  }
	}

	$("#imgInp").change(function() {
	  readURL(this);
	});
</script>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

<script type="text/javascript">
	tinymce.init({
		selector: "#post_content",
		plugins: [
			 "advlist autolink lists link image charmap print preview hr anchor pagebreak",
			 "searchreplace wordcount visualblocks visualchars code fullscreen",
			 "insertdatetime nonbreaking save table contextmenu directionality",
			 "emoticons template paste textcolor colorpicker textpattern"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image responsivefilemanager",
		automatic_uploads: true,
		image_advtab: true,
		images_upload_url: "<?php echo base_url("Admin/Upload_image")?>",
		file_picker_types: 'image',
		paste_data_images:true,
		relative_urls: false,
		remove_script_host: false,
		  file_picker_callback: function(cb, value, meta) {
			 var input = document.createElement('input');
			 input.setAttribute('type', 'file');
			 input.setAttribute('accept', 'image/*');
			 input.onchange = function() {
				var file = this.files[0];
				var reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onload = function () {
				   var id = 'post-image-' + (new Date()).getTime();
				   var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
				   var blobInfo = blobCache.create(id, file, reader.result);
				   blobCache.add(blobInfo);
				   cb(blobInfo.blobUri(), { title: file.name });
				};
			 };
			 input.click();
		  }
   });
</script>
