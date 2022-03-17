


<?php
    foreach ($data['solution_header'] as $key_item => $item) {
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
          <div class="accordion accordion-simple">
              <?php
                foreach ($data['solution_data'] as $key_item => $item) {
              ?>
                <h4><?php echo $item['solution_title'];?></h4>
                <hr/>

                <?php
                  if($item['list'] !=0){
                ?>
                  <div class="accordion accordion-simple">
                    <?php
                        foreach ($item['list'] as $key_item_2 => $item_2) {
                    ?>
                        <div class="ac-item">
                            <h5 class="ac-title"><?php echo $item_2['list_title']; ?></h5>
                            <div class="ac-content">
                                <?php echo $item_2['list_text']; ?>
                            </div>
                        </div>
                    <?php
                      }
                    ?>
                  </div>
                <?php
                  }
                ?>
              <?php
                }
              ?>

          </div>
        </div>
        <div class="col-lg-6">
          <?php
              foreach ($data['solution_image'] as $key_item => $item) {
          ?>
              <img src="<?php echo $item['solution_image'];?>" style="width:100%;">
          <?php
              }
          ?>
        </div>
    </div>
  </div>
</section>

<section>
    <div class="container">
        <ul class="grid grid-4-columns">
          <?php
              foreach ($data['solution_partner'] as $key_item => $item) {
          ?>
          <li>
              <p class="text-center" style="min-height:50px;"><?php echo $item['logo_title']; ?></p>
              <img src="<?php echo $item['logo_image_dark']; ?>" alt="">
          </li>
          <?php
              }
          ?>
        </ul>
    </div>
</section>
