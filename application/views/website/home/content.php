
<?php
    foreach ($data['home_banner'] as $key_item => $item) {
      $home_banner_title = $item['header_title'];
      $home_banner_subtitle = $item['header_subtitle'];
      $home_header_link = $item['header_link'];
      $home_header_image = $item['header_image'];
    }
?>

<section class="parallax text-light halfscreen" data-bg-parallax="<?php echo $home_header_image;?>">
            <div class="container">
                <div class="container-fullscreen">
                    <div class="text-middle text-center text-end m-t-100">
                        <h1 class="text-uppercase text-medium" data-animate="fadeInDown" data-animate-delay="100">Build Data Center Fast, Easy & Multinetwork
                        </h1>
                        <div class="row d-flex justify-content-center">
                          <div class="col-md-8">
                            <p class="lead" data-animate="fadeInDown" data-animate-delay="300">Data center infrastructure is one of the most critical IT infrastructures, where a company will stake its data storage on a data center.</p>
                          </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                          <div class="col-md-2 m-t-50">
                            <a href="<?php echo $home_header_link; ?>" class="btn btn-secondary-orange"><i class="fa fa-cog"></i> Explore Now</a>
                          </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                          <div class="col-md-8 m-t-100 d-none d-sm-block">
                            <div class="carousel" data-items="9" data-dots="false" data-lightbox="gallery">
                                <!-- portfolio item -->
                                <?php
                                    foreach ($data['home_partner'] as $key_item => $item) {
                                ?>
                                <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                                    <div class="portfolio-item-wrap">
                                        <div class="portfolio-image">
                                            <a href="#"><img src="<?php echo $item['logo_image']; ?>" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <!-- end: portfolio item -->
                                <!-- portfolio item -->

                            </div>
                          </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <section id="page-content">
          <div class="container">
            <?php
                $section = 1;
                foreach ($data['home_intro'] as $key_item => $item) {
            ?>
            <?php
                if($section%2 != 0){
            ?>
            <div class="row m-b-100">
                <div class="col-lg-6" data-animate="fadeInLeft">
                    <h5><?php echo $item['text_sub_title']; ?></h3>
                    <h1><?php echo $item['text_title']; ?></h1>
                    <p><?php echo $item['text_intro']; ?></p>
                </div>
                <div class="col-lg-6 m-t-60" data-animate="fadeInRight">
                    <img src="<?php echo $item['text_image']; ?>" style="width:100%;">
                </div>
            </div>
            <?php
                }else{
            ?>
            <div class="row m-b-100">
                <div class="col-lg-6 m-t-60" data-animate="fadeInRight">
                    <img src="<?php echo $item['text_image']; ?>" style="width:100%;">
                </div>
                <div class="col-lg-6" data-animate="fadeInLeft">
                    <h5><?php echo $item['text_sub_title']; ?></h3>
                    <h1><?php echo $item['text_title']; ?></h1>
                    <p><?php echo $item['text_intro']; ?></p>
                </div>
            </div>
            <?php
                }
            ?>
            <?php
                $section++;
              }
            ?>
            <?php
                foreach ($data['home_faq_intro'] as $key_item => $item) {
            ?>
            <div class="row m-b-100">
                <div class="col-lg-6" data-animate="fadeInLeft">
                    <h5><?php echo $item['text_sub_title']; ?></h3>
                    <h1><?php echo $item['text_title']; ?></h1>
                    <p><?php echo $item['text_intro']; ?></p>
                </div>
                <div class="col-lg-6 m-t-60" data-animate="fadeInRight">
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
            </div>
            <?php
                }
            ?>
          </div>
      </section>

      <section class="p-b-40">
        <div class="container" data-animate="fadeInUp">
            <div class="heading-text text-center">
                <p>Our Insight</p>
                <h2>Useful insights<br/>designed for you</h2>
                <p>Wawasan bermanfaat dari tenaga <br/>Ahli kami yang dapat anda pelajari</p>
            </div>
        </div>
        <div id="blog" data-animate="fadeInDown">
          <div class="container">
            <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">
              <?php
                  foreach ($data['insight_list'] as $key_item => $item) {
              ?>
              <div class="post-item border">
                  <div class="post-item-wrap">
                      <div class="post-image">
                          <a href="<?php echo base_url();?>Website/Insight_detail/<?php echo $item['insight_slug'];?>">
                              <img alt="" src="<?php echo $item['insight_image'];?>">
                          </a>
                          <span class="post-meta-category"><?php echo $item['category_title'];?></span>
                      </div>
                      <div class="post-item-description">
                          <span class="post-meta-date"><i class="fa fa-calendar-o"></i><?php echo $item['post_date']; ?></span>
                          <h2><a href="<?php echo base_url();?>Website/Insight_detail/<?php echo $item['insight_slug'];?>"><?php echo $item['insight_title']; ?></a></h2>
                      </div>
                  </div>
              </div>
              <?php
                  }
              ?>
            </div>
            <center data-animate="fadeInLeft">
              <a href="<?php echo base_url();?>Website/Insight/<?php echo $slug=null; ?>" class="btn btn-light btn-creative btn-icon-holder btn-shadow btn-light-hover btn-small">See All Insight<i class="icon-chevron-right"></i></a>
            </center>
          </div>
        </div>
      </section>

      <section class="p-b-40">
          <div class="container" data-animate="fadeInUp">
            <div class="heading-text text-left">
                <span>Our Customer</span>
                <h4>Our Valued Customer</h4>
            </div>
          </div>
          <div class="container" data-animate="fadeInDown">
            <ul class="grid grid-4-columns">
              <?php
                  foreach ($data['customer_list'] as $key_item => $item) {
              ?>
              <li>
                  <img src="<?php echo $item['logo_image']; ?>" alt="">
              </li>
              <?php
                  }
              ?>
            </ul>
          </div>
      </section>
