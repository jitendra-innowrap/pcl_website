<!--==============================
Hero Area
==============================-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

<section class="custom-banner">
  <div class="owl-carousel owl-theme">
    <?php 
            if(isset($banner_list)){
                foreach ($banner_list as $item)
                {                    
        ?>
    <div class="item">
      <img src="<?php echo $item->image; ?>" alt="images not found">
      <div class="cover">
        <div class="container">
          <div class="header-content">
            <!-- <div class="line"></div> -->
            <h1 class="hero-title title-animation"><?php echo $item->title; ?></h1>
            <p class="hero-text title-animation"><?php echo $item->description; ?></p>
            <?php if($item->is_button == 1){ ?>
            <p class="hero-text title-animation"><a href="<?php echo $item->routing_url; ?>" class="btn style2">Know
                More</a></p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <?php
        } }
        ?>
  </div>
</section>

<!--======== / Hero Section ========-->

<!--==============================
Service Area 01  
==============================-->
<div class="service-area-2 space overflow-hidden" style="background-color: #FFF4EF;">
  <div class="container">
    <div class="title-area text-center title-anim">
      <span class="sub-title style2">FIND YOUR SPOT</span>
      <h2 class="sec-title">Our Brands</h2>
    </div>
    <div class="custom-slider">
      <div class="custom-slide-track">
        <div class="custom-slide">
          <div class="service-card2 title-anim"><a href="<?php echo base_url();?>house-of-vivah">
              <div class="service-card2_icon">
                <img src="<?php echo base_url();?>assets/images/logo/vivaah logo 1.png" alt="img">
              </div>
              <div class="service-card2_content">
                <h3 class="service-card2_title">House of Vivah</h3>
                <p class="service-card2_text">For your big fat indian wedding, Vivah is a full service wedding boutique
                  to bring your dreams to li</p>
              </div>
            </a></div>
        </div>

        <div class="custom-slide">
          <div class="service-card2 title-anim"><a href="<?php echo base_url();?>vows-vachan">
              <div class="service-card2_icon">
                <img src="<?php echo base_url();?>assets/images/logo/vows vachan logo.png" alt="img">
              </div>
              <div class="service-card2_content">
                <h3 class="service-card2_title">Vows Vachan</h3>
                <p class="service-card2_text">For an intimate celebration, your search ends right here.</p>
              </div>
            </a></div>
        </div>

        <div class="custom-slide">
          <div class="service-card2 title-anim"><a href="<?php echo base_url();?>event-factory">
              <div class="service-card2_icon">
                <img src="<?php echo base_url();?>assets/images/logo/EVENT FACTORY .png" alt="img">
              </div>
              <div class="service-card2_content">
                <h3 class="service-card2_title">Event Factory</h3>
                <p class="service-card2_text">Elegant black tie affairs and more organized for + organizations
                  (globally/nationally)</p>
              </div>
            </a></div>
        </div>

        <div class="custom-slide">
          <div class="service-card2 title-anim"><a href="<?php echo base_url();?>live-space">
              <div class="service-card2_icon">
                <img src="<?php echo base_url();?>assets/images/logo/Live Space Logo.png" alt="img">
              </div>
              <div class="service-card2_content">
                <h3 class="service-card2_title">Live Space</h3>
                <p class="service-card2_text">Sunday, Sept. 18th 2022.
                  One World Observatory,
                  285 Fulton Street</p>
              </div>
            </a></div>
        </div>

        <div class="custom-slide">
          <div class="service-card2 title-anim"><a href="<?php echo base_url();?>venue-affairs">
              <div class="service-card2_icon">
                <img src="<?php echo base_url();?>assets/images/logo/venue affairs.cdr_ctc.png" alt="img">
              </div>
              <div class="service-card2_content">
                <h3 class="service-card2_title">Venue Affairs</h3>
                <p class="service-card2_text">Sunday, Sept. 18th 2022. Lymni Restaurant, 123 Francois Street</p>
              </div>
            </a></div>
        </div>

        <div class="custom-slide">
          <div class="service-card2 title-anim"><a href="<?php echo base_url();?>party-house">
              <div class="service-card2_icon">
                <img src="<?php echo base_url();?>assets/images/logo/Party House logo.png" alt="img">
              </div>
              <div class="service-card2_content">
                <h3 class="service-card2_title">Party House</h3>
                <p class="service-card2_text">Sunday, Sept. 18th 2022. Rooftoop, 123 Terry Francois Street</p>
              </div>
            </a></div>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- <div class="space service-area-1 overflow-hidden">
  <div class="service-shape1_1 shape-mockup jump d-lg-block d-none" data-top="0" data-left="-5%">
    <img src="<?php echo base_url();?>assets/img/normal/service_1-1.png" alt="img">
  </div>
  <div class="container">
    <div class="title-area text-center title-anim">
      <span class="sub-title style2">FIND YOUR SPOT</span>
      <h2 class="sec-title">Our Brands</h2>
    </div>
    <div class="row gx-90 gy-40 justify-content-center">
      <div class="col-lg-4 col-md-6"><a href="<?php echo base_url();?>house-of-vivah">
          <div class="service-card title-anim" style="min-height: 400px;">
            <div class="service-card_icon">
              <img src="<?php echo base_url();?>assets/images/logo/vivaah logo 1.png" alt="img">
            </div>
            <div class="service-card_content">
              <h4 class="service-card_title h5">House of Vivah</h4>
              <p class="service-card_text service-card_time mt-2">For your big fat indian wedding, Vivah is a full
                service wedding boutique to bring your dreams to li</p>
            </div>
          </div>
        </a></div>

      <div class="col-lg-4 col-md-6"><a href="<?php echo base_url();?>vows-vachan">
          <div class="service-card title-anim" style="min-height: 400px;">
            <div class="service-card_icon">
              <img src="<?php echo base_url();?>assets/images/logo/vows vachan logo.png" alt="img">
            </div>
            <div class="service-card_content">
              <h4 class="service-card_title h5">Vows Vachan</h4>
              <p class="service-card_text service-card_time">For an intimate celebration, your search ends right here.
              </p>
            </div>
          </div>
        </a></div>

      <div class="col-lg-4 col-md-6"><a href="<?php echo base_url();?>event-factory">
          <div class="service-card title-anim" style="min-height: 400px;">
            <div class="service-card_icon">
              <img src="<?php echo base_url();?>assets/images/logo/EVENT FACTORY .png" alt="img">
            </div>
            <div class="service-card_content">
              <h4 class="service-card_title h5">Event Factory</h4>
              <p class="service-card_text service-card_time mt-2">Elegant black tie affairs and more organized for +
                organizations (globally/nationally)</p>
            </div>
          </div>
        </a></div>

      <div class="col-lg-4 col-md-6"><a href="<?php echo base_url();?>live-space">
          <div class="service-card title-anim" style="min-height: 400px;">
            <div class="service-card_icon">
              <img src="<?php echo base_url();?>assets/images/logo/Live Space Logo.png" alt="img">
            </div>
            <div class="service-card_content">
              <h4 class="service-card_title h5">Live Space</h4>
              <p class="service-card_text service-card_time mt-2">Sunday, Sept. 18th 2022.
                One World Observatory,
                285 Fulton Street</p>
            </div>
          </div>
        </a></div>

      <div class="col-lg-4 col-md-6"><a href="<?php echo base_url();?>venue-affairs">
          <div class="service-card title-anim" style="min-height: 400px;">
            <div class="service-card_icon">
              <img src="<?php echo base_url();?>assets/images/logo/venue affairs.cdr_ctc.png" alt="img">
            </div>
            <div class="service-card_content">
              <h4 class="service-card_title h5">Venue Affairs</h4>
              <p class="service-card_text service-card_time mt-2">Sunday, Sept. 18th 2022. Lymni Restaurant, 123
                Francois Street</p>
            </div>
          </div>
        </a></div>

      <div class="col-lg-4 col-md-6"><a href="<?php echo base_url();?>party-house">
          <div class="service-card title-anim" style="min-height: 400px;">
            <div class="service-card_icon">
              <img src="<?php echo base_url();?>assets/images/logo/Party House logo.png" alt="img">
            </div>
            <div class="service-card_content">
              <h4 class="service-card_title h5">Party House</h4>
              <p class="service-card_text service-card_time mt-2">Sunday, Sept. 18th 2022. Rooftoop, 123 Terry Francois
                Street</p>
            </div>
          </div>
        </a></div>

    </div>
  </div>
</div> -->

<!--==============================
About Area  
==============================-->
<div class="space about-us-custom" style="background-color: #543718;">
  <div class="container">
    <div class="row flex-row-reverse align-items-center justify-content-between">
      <div class="col-lg-7 ">
        <div class="about-thumb mb-5 mb-lg-0 text-lg-end fade_left">
          <img class="about-img-1" src="<?php echo base_url();?>assets/images/vivaah.jpg" alt="img">
        </div>
      </div>
      <div class="col-lg-5">
        <div class="about-content-wrap title-anim">
          <div class="title-area mb-0">
            <span class="sub-title">ABOUT US</span>
            <h2 class="sec-title">PARTY CRUISERS LTD.</h2>
            <p class="sec-text">As Party Cruisers Limited, listed on the NSE since 2021, we are a collective that brings
              you the most luxe events you’ve experienced without having to worry if your guests are having an engaging
              and personalized event.</p>
            <p class="sec-text">Since 1994, we’ve expanded to a range of event services apart from our expertise in
              wedding curation and execution, focused on end to end management by working with eminent service
              providers.</p>
          </div>
          <div class="btn-wrap mt-40">
            <a href="<?php echo base_url();?>about-us" class="btn">More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--==============================
Service Area 01  
==============================-->
<div class="space service-area-1 overflow-hidden">
  <div class="service-shape1_1 shape-mockup jump d-lg-block d-none" data-top="0" data-left="-5%">
    <img src="<?php echo base_url();?>assets/img/normal/service_1-1.png" alt="img">
  </div>
  <div class="container">
    <div class="title-area text-center title-anim">
      <span class="sub-title style2">Check out some of our</span>
      <h2 class="sec-title">Success Story</h2>
    </div>
    <div class="row gx-90 gy-40 justify-content-center success-story">
      <div class="col-lg-8 col-md-12">
        <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
          <?php if (isset($success_story)) {
                foreach ($success_story as $index => $item) {
                $brand = str_replace('_', ' ', $item->brand); ?>
          <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo ($index == 0 ? 'active' : ''); ?>"
              id="pills-<?php echo $item->brand; ?>-tab" data-bs-toggle="pill"
              data-bs-target="#pills-<?php echo $item->brand; ?>" type="button" role="tab"
              aria-controls="pills-<?php echo $item->brand; ?>"
              aria-selected="<?php echo ($index == 0 ? 'true' : 'false'); ?>"><?php echo $brand; ?></button>
          </li>
          <?php }
            } ?>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <?php if (isset($success_story)) {
    foreach ($success_story as $index => $item) {
        $brand = str_replace('_', ' ', $item->brand); ?>
          <div class="tab-pane fade <?php echo ($index == 0 ? 'show active' : ''); ?>"
            id="pills-<?php echo $item->brand; ?>" role="tabpanel"
            aria-labelledby="pills-<?php echo $item->brand; ?>-tab">
            <div class="row">
              <div class="col-lg-8 col-md-12">
                <div class="row">
                  <?php if(isset($item->photos['0'])){?>
                  <div class="col-4">
                    <div class="responsive-container aspect-ratio-1-1">
                      <img
                        src="<?php echo (isset($item->photos['0']) ? $item->photos['0'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                  </div>
                  <?php } ?>
                  <?php if(isset($item->photos['1'])){?>
                  <div class="col-4">
                    <div class="responsive-container aspect-ratio-1-1">
                      <img
                        src="<?php echo (isset($item->photos['1']) ? $item->photos['1'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                  </div>
                  <?php } ?>
                  <?php if(isset($item->photos['2'])){?>
                  <div class="col-4">
                    <div class="responsive-container aspect-ratio-1-1">
                      <img
                        src="<?php echo (isset($item->photos['2']) ? $item->photos['2'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                  </div>
                  <?php } ?>
                  <?php if(isset($item->photos['3'])){?>
                  <div class="col-12 mt-4 mb-4">
                    <div class="responsive-container aspect-ratio-2-1">
                      <img
                        src="<?php echo (isset($item->photos['3']) ? $item->photos['3'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-4 col-md-12">
                <div class="row">
                  <?php if(isset($item->photos['4'])){?>
                  <div class="col-lg-12 col-6 mb-4">
                    <div class="responsive-container aspect-ratio-1-2">
                      <img
                        src="<?php echo (isset($item->photos['4']) ? $item->photos['4'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                  </div>
                  <?php } ?>
                  <?php if(isset($item->photos['5'])){?>
                  <div class="col-lg-12 col-6">
                    <div class="responsive-container aspect-ratio-3-2">
                      <img
                        src="<?php echo (isset($item->photos['5']) ? $item->photos['5'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <?php } } ?>

        </div>
      </div>
    </div>
  </div>
</div>

<!--==============================
    Portfolio Area  
==============================-->
<div class="portfolio-area-1 space overflow-hidden"
  data-bg-src="<?php echo base_url();?>assets/img/bg/portfolio-1-bg.png">
  <div class="portfolio-shape1_1 shape-mockup jump d-lg-block d-none" data-top="0%" data-right="-10%">
    <img src="<?php echo base_url();?>assets/img/normal/portfolio-shape_1-1.png" alt="img">
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-md-12">
        <div class="title-area text-center title-anim">
          <span class="sub-title style2">Testimonials</span>
          <h2 class="sec-title">Hear from our customers</h2>
        </div>
      </div>
    </div>
    <div class="row gx-90 gy-40 justify-content-center testimonials">
      <div class="col-lg-10 col-md-12">
        <?php if (isset($testimonial['video'])) { ?>
        <div class="row">
          <!-- <div class="col-lg-6 col-md-12">
            <div class="row">
              <div class="col-5">
                <div class="responsive-container aspect-ratio-1-2">
                  <img
                    src="<?php echo (isset($testimonial['video']['0']->video_thumbnail) ? $testimonial['video']['0']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                    alt="Image">
                </div>
              </div>
              <div class="col-7">
                <div class="responsive-container aspect-ratio-3-2">
                  <img
                    src="<?php echo (isset($testimonial['video']['1']->video_thumbnail) ? $testimonial['video']['1']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                    alt="Image">
                </div>
              </div>
              <div class="col-12 mt-4 mb-4">
                <div class="row">
                  <div class="col-7">
                    <div class="responsive-container aspect-ratio-1-3">
                      <img
                        src="<?php echo (isset($testimonial['video']['2']->video_thumbnail) ? $testimonial['video']['2']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                  </div>
                  <div class="col-5">
                    <div class="row">
                      <div class="col-12 mb-4">
                        <div class="responsive-container aspect-ratio-1-2">
                          <img
                            src="<?php echo (isset($testimonial['video']['3']->video_thumbnail) ? $testimonial['video']['3']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                            alt="Image">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="responsive-container aspect-ratio-1-2">
                          <img
                            src="<?php echo (isset($testimonial['video']['4']->video_thumbnail) ? $testimonial['video']['4']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                            alt="Image">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-4">
                <div class="responsive-container aspect-ratio-4-2">
                  <img
                    src="<?php echo (isset($testimonial['video']['5']->video_thumbnail) ? $testimonial['video']['5']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                    alt="Image">
                </div>
              </div>
            </div>
          </div> -->
          <div class="col-lg-6 col-md-12 small-fa-play">
            <div class="row">
              <?php if(isset($testimonial['video']['0']->video_thumbnail)){?>
              <div class="col-5 video-wrap">
                <div class="responsive-container aspect-ratio-1-2">
                  <img
                    src="<?php echo (isset($testimonial['video']['0']->video_thumbnail) ? $testimonial['video']['0']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                    alt="Image">
                </div>
                <a href="<?php echo $testimonial['video']['0']->video_url ?>"
                  class="play-btn popup-video background-image">
                  <i class="fas fa-solid fa-play"></i>
                </a>
              </div>
              <?php } ?>
              <?php if(isset($testimonial['video']['1']->video_thumbnail)){?>
              <div class="col-7 video-wrap">
                <div class="responsive-container aspect-ratio-3-2">
                  <img
                    src="<?php echo (isset($testimonial['video']['1']->video_thumbnail) ? $testimonial['video']['1']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                    alt="Image">
                </div>
                <a href="<?php echo $testimonial['video']['1']->video_url ?>"
                  class="play-btn popup-video background-image">
                  <i class="fas fa-solid fa-play"></i>
                </a>
              </div>
              <?php } ?>
              <div class="col-12 mt-4 mb-4">
                <div class="row">
                  <?php if(isset($testimonial['video']['2']->video_thumbnail)){?>
                  <div class="col-7 video-wrap">
                    <div class="responsive-container aspect-ratio-1-3">
                      <img
                        src="<?php echo (isset($testimonial['video']['2']->video_thumbnail) ? $testimonial['video']['2']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                    <a href="<?php echo $testimonial['video']['2']->video_url ?>"
                      class="play-btn popup-video background-image">
                      <i class="fas fa-solid fa-play"></i>
                    </a>
                  </div>
                  <?php } ?>
                  <div class="col-5">
                    <div class="row">
                      <?php if(isset($testimonial['video']['3']->video_thumbnail)){?>
                      <div class="col-12 mb-4 video-wrap">
                        <div class="responsive-container aspect-ratio-1-2">
                          <img
                            src="<?php echo (isset($testimonial['video']['3']->video_thumbnail) ? $testimonial['video']['3']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                            alt="Image">
                        </div>
                        <a href="<?php echo $testimonial['video']['3']->video_url ?>"
                          class="play-btn popup-video background-image">
                          <i class="fas fa-solid fa-play"></i>
                        </a>
                      </div>
                      <?php } ?>
                      <?php if(isset($testimonial['video']['4']->video_thumbnail)){?>
                      <div class="col-12 video-wrap">
                        <div class="responsive-container aspect-ratio-1-2">
                          <img
                            src="<?php echo (isset($testimonial['video']['4']->video_thumbnail) ? $testimonial['video']['4']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                            alt="Image">
                        </div>
                        <a href="<?php echo $testimonial['video']['4']->video_url ?>"
                          class="play-btn popup-video background-image">
                          <i class="fas fa-solid fa-play"></i>
                        </a>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php if(isset($testimonial['video']['5']->video_thumbnail)){?>
              <div class="col-12 mb-4 video-wrap">
                <div class="responsive-container aspect-ratio-4-2">
                  <img
                    src="<?php echo (isset($testimonial['video']['5']->video_thumbnail) ? $testimonial['video']['5']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                    alt="Image">
                </div>
                <a href="<?php echo $testimonial['video']['5']->video_url ?>"
                  class="play-btn popup-video background-image">
                  <i class="fas fa-solid fa-play"></i>
                </a>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="row">
              <div class="col-md-6 col-sm-12 mb-4">
                <?php if(isset($testimonial['text']['0']->text)){ ?>
                <div class="responsive-container testimonial-text">
                  <span class="more"><?php echo $testimonial['text']['0']->text; ?></span>
                  <p class="author"><?php echo $testimonial['text']['0']->client_name; ?></p>
                </div>
                <?php } ?>
                <?php if(isset($testimonial['text']['2']->text)){ ?>
                <div class="responsive-container testimonial-text mt-4">
                  <span class="more1"><?php echo $testimonial['text']['2']->text; ?></span>
                  <p class="author"><?php echo $testimonial['text']['2']->client_name; ?></p>
                </div>
                <?php } ?>
                <?php if(isset($testimonial['text']['4']->text)){ ?>
                <div class="responsive-container testimonial-text mt-4">
                  <span class="more"><?php echo $testimonial['text']['4']->text; ?></span>
                  <p class="author"><?php echo $testimonial['text']['4']->client_name; ?></p>
                </div>
                <?php } ?>
              </div>
              <div class="col-md-6 col-sm-12">
                <?php if(isset($testimonial['text']['1']->text)){ ?>
                <div class="responsive-container testimonial-text">
                  <span class="more1"><?php echo $testimonial['text']['1']->text; ?></span>
                  <p class="author"><?php echo $testimonial['text']['1']->client_name; ?></p>
                </div>
                <?php } ?>
                <?php if(isset($testimonial['text']['3']->text)){ ?>
                <div class="responsive-container testimonial-text mt-4">
                  <span class="more"><?php echo $testimonial['text']['3']->text; ?></span>
                  <p class="author"><?php echo $testimonial['text']['3']->client_name; ?></p>
                </div>
                <?php } ?>
                <?php if(isset($testimonial['text']['5']->text)){ ?>
                <div class="responsive-container testimonial-text mt-4">
                  <span class="more1"><?php echo $testimonial['text']['5']->text; ?></span>
                  <p class="author"><?php echo $testimonial['text']['5']->client_name; ?></p>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<!--==============================
    Contact Area  
==============================-->
<?php include 'contact_form.php'; ?>

<!--==============================
Blog Area  
==============================-->
<section class="blog-area space">
  <div class="container">
    <div class="title-area text-center title-anim">
      <span class="sub-title style2">Our Blog Posts
      </span>
      <h2 class="sec-title">Latest from our Journal</h2>
    </div>

    <div class="row flex-row-reverse">
      <?php 
        if(isset($blog['0'])){        

            $formattedDate = '';
            $dateString = $blog['0']['blog_date'];
            $date = new DateTime($dateString);
            $formattedDate = $date->format('d M Y');
    ?>
      <div class="col-lg-4 mb-30 mb-lg-0">
        <div class="blog-grid style2 style-big title-anim">
          <div class="blog-img">
            <img src="<?php echo $blog['0']['image_medium']; ?>" alt="<?php echo $blog['0']['image_alt']; ?>">
          </div>
          <div class="blog-content">
            <div class="post-meta-item blog-meta">
              <a><?php echo strtoupper($blog['0']['author']); ?></a>
              <a><?php echo $formattedDate; ?></a>
              <a><?php echo $blog['0']['categories']; ?></a>
            </div>
            <h3 class="blog-title"><a
                href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['0']['slug']; ?>"><?php echo $blog['0']['title']; ?></a>
            </h3>
            <!-- <div class="post-content blog-text">
                <p><?php echo $blog['0']['content']; ?> ...</p>
            </div> -->
            <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['0']['slug']; ?>"
              class="link-btn style2">Continue Reading <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <?php } ?>
      <div class="col-lg-8">
        <?php 
            if(isset($blog['1'])){        

                $formattedDate = '';
                $dateString = $blog['1']['blog_date'];
                $date = new DateTime($dateString);
                $formattedDate = $date->format('d M Y');
        ?>
        <div class="blog-grid style2 style-small title-anim">
          <div>
            <div class="blog-img">
              <img style="max-height:275px;" src="<?php echo $blog['1']['image_medium']; ?>"
                alt="<?php echo $blog['1']['image_alt']; ?>">
            </div>
          </div>
          <div class="blog-content">
            <div class="post-meta-item blog-meta">
              <a><?php echo strtoupper($blog['1']['author']); ?></a>
              <a><?php echo $formattedDate; ?></a>
              <a><?php echo $blog['1']['categories']; ?></a>
            </div>
            <h3 class="blog-title"><a
                href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['1']['slug']; ?>"><?php echo $blog['1']['title']; ?></a>
            </h3>
            <!-- <div class="post-content blog-text">
                <p><?php echo $blog['1']['content']; ?> ...</p>
            </div> -->
            <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['1']['slug']; ?>"
              class="link-btn style2">Continue Reading <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
        <?php } 
         if(isset($blog['2'])){        

            $formattedDate = '';
            $dateString = $blog['2']['blog_date'];
            $date = new DateTime($dateString);
            $formattedDate = $date->format('d M Y');
        ?>
        <div class="blog-grid style2 style-small title-anim">
          <div>
            <div class="blog-img">
              <img style="max-height:275px;" src="<?php echo $blog['2']['image_medium']; ?>"
                alt="<?php echo $blog['2']['image_alt']; ?>">
            </div>
          </div>
          <div class="blog-content">
            <div class="post-meta-item blog-meta">
              <a><?php echo strtoupper($blog['2']['author']); ?></a>
              <a><?php echo $formattedDate; ?></a>
              <a><?php echo $blog['2']['categories']; ?></a>
            </div>
            <h3 class="blog-title"><a
                href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['2']['slug']; ?>"><?php echo $blog['2']['title']; ?></a>
            </h3>
            <!-- <div class="post-content blog-text">
                <p><?php echo $blog['2']['content']; ?> ...</p>
            </div> -->
            <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['2']['slug']; ?>"
              class="link-btn style2">Continue Reading <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script>
$('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  dots: false,
  nav: true,
  mouseDrag: false,
  autoplay: true,
  animateOut: 'slideOutRight',
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
});
</script>