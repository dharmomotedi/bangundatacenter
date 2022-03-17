


<?php
    foreach ($data['faq_header'] as $key_item => $item) {
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
    <div class="row m-b-100">
        <div class="col-lg-8">
          <div class="accordion accordion-simple">
            <?php
                $faq = 1;
                foreach ($data['faq_list'] as $key_faq => $item_faq) {
                if($faq==1){
                  $active = "ac-active";
                }else{
                  $active = "";
                }
            ?>
              <div class="ac-item <?php echo $active; ?>">
                  <h5 class="ac-title"><?php echo $item_faq['faq_title']; ?></h5>
                  <div class="ac-content">
                      <?php echo $item_faq['faq_content']; ?>
                  </div>
              </div>
              <?php
                $faq++;
                  }
              ?>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="blockquote blockquote-color text-light">
              <i class="fas fa-phone fa-lg"></i>
              <h4>Anda Butuh <br/>Bantuan Kami ?</h4>
              <a href="https://api.whatsapp.com/send?phone=<?php echo $data['contact_number']; ?>&text=Hello,%20Saya%20ingin%20menanyakan" class="btn btn-youtube">
                  <i class="fab fa-whatsapp"></i> Whatsapp Now
              </a>
          </div>
        </div>
    </div>
  </div>
</section>
