

<?php
    foreach ($data['insight_detail'] as $key_item => $item) {
      $title = $item['insight_title'];
      $category = $item['category_title'];
      $image =  $item['insight_image'];
      $content =  $item['insight_content'];
    }
?>

<?php
    foreach ($data['insight_header'] as $key_item => $item) {
?>
<section id="page-title" class="text-light z-index-1" style="background-image:url(<?php echo $item['header_image']; ?>); background-size: cover; background-position: center center;">
    <div class="container">
        <div class="page-title">
            <h1><?php echo $title; ?></h1>
            <span><?php echo $category; ?></span>
        </div>
    </div>

</section>
<?php
    }
?>



<section id="page-content z-index-2" style="overflow: visible ;">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <img src="<?php echo $image;?>" style="width:100%;margin-top: -130px;">
        </div>
      </div>
      <div class="row p-t-100">
        <div class="col-md-12">
          <?php echo $content; ?>
        </div>
      </div>
    </div>
</section>

<section class="p-b-40">
  <div class="container">
      <div class="heading-text text-center">
          <p>Our Insight</p>
          <h2>Useful insights<br/>designed for you</h2>
          <p>Wawasan bermanfaat dari tenaga <br/>Ahli kami yang dapat anda pelajari</p>
      </div>
  </div>
  <div id="blog">
    <div class="container">
      <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">
        <?php
            foreach ($data['insight_other_list'] as $key_item => $item) {
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
    </div>
  </div>
</section>
