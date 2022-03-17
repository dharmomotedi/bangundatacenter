<?php
    foreach ($data['section_data'] as $key_item => $item) {
?>

<section class="text-center text-light p-t-50 p-b-50" style=" background: url(<?php echo $item['header_image']; ?>) no-repeat center center; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
    <div class="bg-overlay"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7">
        <div class="heading-text heading-section text-center m-b-40">
            <h4><?php echo $item['header_subtitle']; ?></h4>
        </div>
        <a href="<?php echo $item['header_link']; ?>" class="btn btn-main"><span>Learn More</span></a>
      </div>
      </div>
    </div>
</section>
<?php
    }
?>

<?php
    foreach ($data['footer_data'] as $key => $item) {
      $footer_image = $item['header_image'];
    }
?>

<footer id="footer" style=" background: url(<?php echo $footer_image; ?>) no-repeat center center; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 text-white">
                    <div class="widget">
                        <img src="<?php echo $this->config->item('website_source'); ?>img/logo1.svg">
                        <?php
                            foreach ($data['contact_data'] as $key => $item) {
                        ?>
                        <p><?php echo  $item['contact_content'];?></p>
                        <?php
                            }
                        ?>
                          <div class="row">
                        <div class="mb-4 social-icons social-icons-colored-hover">
                            <ul>
                        <?php
                            foreach ($data['social_data'] as $key => $item) {
                        ?>
                          <li><a href="<?php echo $item['social_link'];?>" target="_blank"><i class="<?php echo $item['social_icon'];?>"></i></a></li>
                        <?php

                            }
                        ?>
                          </ul>
                        </div>
                      </div>
                        <div class="row">
                          <div class="col-md-12">
                              <p>&copy; 2022 Designed by <a href="https://www.npspemuda.co.id/" target="_blank">PT NPS Pemuda Berdikarisma</a></p>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
