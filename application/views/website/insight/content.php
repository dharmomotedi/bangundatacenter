


<?php
    foreach ($data['insight_header'] as $key_item => $item) {
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
      <div class="page-menu menu-outline style-1">
          <div class="container">
              <nav>
                  <ul>
                    <?php
                      if($data['slug'] == "all_category"){
                        $active = "active";
                      }else{
                          $active = "";
                      }
                    ?>
                    <li class="<?php echo $active;?>"><a href="<?php echo base_url();?>Website/Insight/all_category">All Category</a></li>
                    <?php

                          foreach ($data['insight_category'] as $key_item => $item) {
                            $slug = str_replace("%20"," ",$data['slug']);
                            if($slug == $item['category_title']){
                                $active = "active";
                            }else{
                                $active = "";
                            }
                      ?>
                        <li class="<?php echo $active;?>"><a href="<?php echo base_url();?>Website/Insight/<?php echo $item['category_title'];?>"><?php echo $item['category_title'];?></a></li>
                      <?php
                          }
                      ?>

                  </ul>
              </nav>
              <div id="pageMenu-trigger">
                  <i class="fa fa-bars"></i>
              </div>
          </div>
      </div>



        <div class="col-lg-12 p-t-50">
            <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">
              <?php
                  foreach ($data['Insight_list'] as $key => $item) {
              ?>
                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="<?php echo base_url();?>Website/Insight_detail/<?php echo $item['insight_slug'];?>">
                                  <div style="background: url(<?php echo $item['insight_image']?>) no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;width:100%;height:300px;">
                                  </div>
                                </a>
                                <span class="post-meta-category"><?php echo $item['category_title']; ?></span>
                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i><?php echo $item['post_date']?></span>
                                <h2><a href="<?php echo base_url();?>Website/Insight_detail/<?php echo $item['insight_slug'];?>"><?php echo $item['insight_title']?></a></h2>
                            </div>
                        </div>
                    </div>

              <?php
                  }
              ?>

            </div>
        </div>
        <div class="col-lg-12">
          <center>
            <div style='margin-top: 10px;'><?php echo $pagination; ?></div>
          </center>
        </div>


    </div>
  </div>
</section>
