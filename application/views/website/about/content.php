
<?php
    foreach ($data['about_detail'] as $key_item => $item) {
      $about_text = $item['about_text'];
      $about_team = $item['about_team'];
      $about_image = $item['about_image'];
    }
?>

<?php
    foreach ($data['about_header'] as $key_item => $item) {
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
        <div class="col-lg-6">
          <h3>About Us</h3>
          <p><?php echo $about_text; ?></p>
          <h3 class="p-t-100">Our Team</h3>
          <?php echo $about_team; ?>
        </div>
        <div class="col-lg-6 m-t-60">
            <img src="<?php echo $about_image; ?>" style="width:100%;">
        </div>
    </div>
  </div>
</section>

<section>
    <div class="container">
        <h3>Our Valued Customer</h3>
        <ul class="grid grid-4-columns">
          <?php
              foreach ($data['about_custumer'] as $key_item => $item) {
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
