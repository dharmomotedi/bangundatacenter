


<?php
    foreach ($data['inquiry_header'] as $key_item => $item) {
?>
<section id="page-title" class="text-light" style="background-image:url(<?php echo $item['header_image']; ?>); background-size: cover; background-position: center center;">
    <div class="container">
        <div class="page-title">
            <h1><?php echo $item['header_title']; ?></h1>
            <span><?php echo $item['header_subtitle']; ?></span>
        </div>
    </div>
</section>
<?php
    }
?>

<section id="page-content">
  <div class="container">
    <div class="row m-b-100 justify-content-center">
        <div class="col-lg-7">
          <form action="<?php echo base_url();?>Admin/Submit_inquiry"  method="post" enctype="multipart/form-data">
            <div class="row">
              <h3>Request a Quote</h3>
              <div class="form-group col-md-6">
                  <label for="name">Name <span style="color:red;">*</span></label>
                  <input type="text" name="inquiry_name"  class="form-control required name" placeholder="Enter your name" required>
              </div>
              <div class="form-group col-md-6">
                  <label for="name">Company</label>
                  <input type="text"  name="inquiry_company"  class="form-control required name" placeholder="Enter your company name">
              </div>
              <div class="form-group col-md-6">
                  <label for="name">Phone <span style="color:red;">*</span></label>
                  <input type=text name="inquiry_phone"  class="form-control required name allownumericwithdecimal" placeholder="Enter your phone" required>
              </div>
              <div class="form-group col-md-6">
                  <label for="name">Industry</label>
                  <input type="text" name="inquiry_industry"  class="form-control required name" placeholder="Enter your industry">
              </div>
              <div class="form-group col-md-12">
                  <label for="name">Tell Us Your Needs <span style="color:red;">*</span></label>
                  <textarea type="text" name="inquiry_needs"  rows="5" class="form-control required" placeholder="Enter your needs" required></textarea>
              </div>
              <div class="form-group">
                  <input type="checkbox" name="terms_conditions" id="terms_conditions" class="form-check-input" value="1" required>
                  <label class="custom-control-label" for="terms_conditions">By clicking the submit button, you agree to receive communications from us regarding our products and services.</label>
              </div>
              	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <button class="btn btn-main" type="submit" id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;Send Request Now</button>

            </div>
            </form>
        </div>
    </div>
  </div>
</section>
