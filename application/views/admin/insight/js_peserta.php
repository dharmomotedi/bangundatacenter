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
<script src="<?php echo $this->config->item('admin_source'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $this->config->item('admin_source'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo $this->config->item('admin_source'); ?>js/demo/datatables-demo.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('admin_source'); ?>plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    var table;
    $(document).ready(function(){
        //datatables
        table = $('#table').DataTable({
            "oLanguage": {
              "sProcessing": "Mohon Tunggu..."
            },
            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('Admin/insight_all')?>",
                "type": "POST"
            },

            "columnDefs": [
            {
                "targets": [ 0 ],
                "orderable": false,
            },
            ],

        });

    });
</script>
