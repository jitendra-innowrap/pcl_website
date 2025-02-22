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
    <div class="item" style="background-image: url('<?php echo $item->image; ?>');">
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
<div class="service-area-2 mt-5 mb-5 overflow-hidden">
  <div class="container">
    <div class="row align-items-center justify-content-between">
      <div class="col-lg-5">
        <div class="about-content-wrap title-anim" style="perspective: 400px;">
          <div
            style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 183px 194.297px; transform: translate3d(0px, 0px, 0px); opacity: 1;">
            <div class="title-area mb-0">
              <span class="sub-title">ABOUT US</span>
              <h2 class="sec-title" style="margin: inherit;">PARTY CRUISERS LTD.</h2>
              <p class="sec-text">As Party Cruisers Limited, listed on the NSE since 2021, we are a collective that
                brings you the most luxe events you’ve experienced without having to worry if your guests are having an
                engaging and personalized event.</p>
              <p class="sec-text">Since 1994, we’ve expanded to a range of event services apart from our expertise in
                wedding curation and execution, focused on end to end management by working with eminent service
                providers.</p>
            </div>
          </div>
          <div
            style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 183px 24px; transform: translate3d(0px, 0px, 0px); opacity: 1;">
            <div class="btn-wrap mt-40">
              <a href="<?php echo base_url();?>about-us" class="btn">Know More</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="row">
          <div class="col-6 col-md-4 filter-item">
            <div class="flip-container">
              <div class="flipper"><a href="<?php echo base_url();?>house-of-vivaah">
                  <div clas="front">
                    <img class="scale-md-1" src="<?php echo base_url();?>assets/images/logo/vivaah.png">
                  </div>
                </a>
                <div class="back"><a href="<?php echo base_url();?>house-of-vivaah">
                    <p> House Of Vivaah <br> Design | Decor | Production</p>
                  </a></div>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 filter-item">
            <div class="flip-container">
              <div class="flipper"><a href="<?php echo base_url();?>vows-vachan">
                  <div clas="front">
                    <img src="<?php echo base_url();?>assets/images/logo/vows-vachan.png">
                  </div>
                </a>
                <div class="back"><a href="<?php echo base_url();?>vows-vachan">
                    <p>Vows Vachan <br> The Wedding Curators</p>
                  </a></div>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 filter-item">
            <div class="flip-container">
              <div class="flipper"><a href="<?php echo base_url();?>event-factory">
                  <div clas="front">
                    <img class="scale-md-1" src="<?php echo base_url();?>assets/images/logo/event-factory.png">
                  </div>
                </a>
                <div class="back"><a href="<?php echo base_url();?>event-factory">
                    <p>Event Factory <br> Corporate Impression Management</p>
                  </a></div>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 filter-item">
            <div class="flip-container">
              <div class="flipper"><a href="<?php echo base_url();?>party-house">
                  <div clas="front">
                    <img src="<?php echo base_url();?>assets/images/logo/party-house.png">
                  </div>
                </a>
                <div class="back"><a href="<?php echo base_url();?>party-house">
                    <p>Party House <br> Milestone & Social Celebrations</p>
                  </a></div>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 filter-item">
            <div class="flip-container">
              <div class="flipper"><a href="<?php echo base_url();?>live-space">
                  <div clas="front">
                    <img class="scale-md-1" src="<?php echo base_url();?>assets/images/logo/live-space.png">
                  </div>
                </a>
                <div class="back"><a href="<?php echo base_url();?>live-space">
                    <p>Livespace <br> Entertainment & Artist Management</p>
                  </a></div>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 filter-item">
            <div class="flip-container">
              <div class="flipper"><a href="<?php echo base_url();?>venue-affairs">
                  <div clas="front">
                    <img src="<?php echo base_url();?>assets/images/logo/venue-affairs.png">
                  </div>
                </a>
                <div class="back"><a href="<?php echo base_url();?>venue-affairs">
                    <p>Venue Affairs <br> Venues Bookings & Management</p>
                  </a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--==============================
Service Area 01  
==============================-->
<div class="mb-5 service-area-1 overflow-hidden">
  <!-- <div class="service-shape1_1 shape-mockup jump d-lg-block d-none" data-top="0" data-left="-5%">
    <img src="<?php echo base_url();?>assets/img/normal/service_1-1.png" alt="img">
  </div> -->
  <div class="container">
    <div class="title-area text-center title-anim">
      <!-- <span class="sub-title style2">Check out some of our</span> -->
      <h2 class="sec-title">Success Story</h2>
    </div>
    <div class="row gx-90 gy-40 justify-content-center success-story">
      <div class="col-md-12">
        <ul class="nav nav-pills mb-5 success-story-scroller" id="pills-tab" role="tablist">
          <?php if (isset($success_story)) {
                foreach ($success_story as $index => $item) {
                $brand = str_replace(' ', '_', $item['brand']); ?>
          <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo ($index == 0 ? 'active' : ''); ?>" id="pills-<?php echo $brand; ?>-tab"
              data-bs-toggle="pill" data-bs-target="#pills-<?php echo $brand; ?>" type="button" role="tab"
              aria-controls="pills-<?php echo $brand; ?>"
              aria-selected="<?php echo ($index == 0 ? 'true' : 'false'); ?>"><?php echo $item['brand']; ?></button>
          </li>
          <?php }
            } ?>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <?php if (isset($success_story)) {
    foreach ($success_story as $index => $item) {
        $brand = str_replace(' ', '_', $item['brand']); ?>
          <div class="tab-pane fade <?php echo ($index == 0 ? 'show active' : ''); ?>" id="pills-<?php echo $brand; ?>"
            role="tabpanel" aria-labelledby="pills-<?php echo $brand; ?>-tab">
            <div class="row">
              <div class="col-lg-8 col-md-12">
                <div class="row">
                  <?php if(isset($item['data']['0']['image'])){?>
                  <div class="col-4 mb-4">
                    <div class="responsive-container aspect-ratio-1-1"><a
                        href="<?php echo base_url();?>success-story?id=<?php echo $item['data']['0']['id']; ?>">
                        <img
                          src="<?php echo (isset($item['data']['0']['image']) ? $item['data']['0']['image'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </a></div>
                  </div>
                  <?php } ?>
                  <?php if(isset($item['data']['1']['image'])){?>
                  <div class="col-4 mb-4">
                    <div class="responsive-container aspect-ratio-1-1"><a
                        href="<?php echo base_url();?>success-story?id=<?php echo $item['data']['1']['id']; ?>">
                        <img
                          src="<?php echo (isset($item['data']['1']['image']) ? $item['data']['1']['image'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </a></div>
                  </div>
                  <?php } ?>
                  <?php if(isset($item['data']['2']['image'])){?>
                  <div class="col-4 mb-4">
                    <div class="responsive-container aspect-ratio-1-1"><a
                        href="<?php echo base_url();?>success-story?id=<?php echo $item['data']['2']['id']; ?>">
                        <img
                          src="<?php echo (isset($item['data']['2']['image']) ? $item['data']['2']['image'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </a></div>
                  </div>
                  <?php } ?>
                  <?php if(isset($item['data']['4']['image'])){?>
                  <div class="col-12 mb-4">
                    <div class="responsive-container aspect-ratio-2-1"><a
                        href="<?php echo base_url();?>success-story?id=<?php echo $item['data']['4']['id']; ?>">
                        <img
                          src="<?php echo (isset($item['data']['4']['image']) ? $item['data']['4']['image'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </a></div>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-4 col-md-12">
                <div class="row">
                  <?php if(isset($item['data']['3']['image'])){?>
                  <div class="col-lg-12 col-6 mb-4">
                    <div class="responsive-container aspect-ratio-1-2"><a
                        href="<?php echo base_url();?>success-story?id=<?php echo $item['data']['3']['id']; ?>">
                        <img
                          src="<?php echo (isset($item['data']['3']['image']) ? $item['data']['3']['image'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </a></div>
                  </div>
                  <?php } ?>
                  <?php if(isset($item['data']['5']['image'])){?>
                  <div class="col-lg-12 col-6">
                    <div class="responsive-container aspect-ratio-3-2"><a
                        href="<?php echo base_url();?>success-story?id=<?php echo $item['data']['5']['id']; ?>">
                        <img
                          src="<?php echo (isset($item['data']['5']['image']) ? $item['data']['5']['image'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </a></div>
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
    Counter Area  
==============================-->
<div class="counter-area-2 bg-gradient">
  <div class="counter-wrap1 pt-5 pb-5 counter-item">
    <div class="container">
      <div class="row gy-40 justify-content-lg-evenly justify-content-center">
        <div class="col-sm-6 col-lg-auto">
          <div class="counter-card">
            <div class="media-body" style="text-align: center;">
              <h3 class="counter-card_number">
                <span class="odometer" data-odometer-final="1500+">.</span>
              </h3>
              <p class="counter-card_text">Successful Projects</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-auto">
          <div class="counter-card">
            <div class="media-body" style="text-align: center;">
              <h3 class="counter-card_number">
                <span class="odometer" data-odometer-final="250+">.</span>
              </h3>
              <p class="counter-card_text">Skilled Team Members</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-auto">
          <div class="counter-card">
            <div class="media-body" style="text-align: center;">
              <h3 class="counter-card_number">
                <span class="odometer" data-odometer-final="40+">.</span>
              </h3>
              <p class="counter-card_text">In-House Services Offered</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-auto">
          <div class="counter-card">
            <div class="media-body" style="text-align: center;">
              <h3 class="counter-card_number">
                <span class="odometer" data-odometer-final="650+">.</span>
              </h3>
              <p class="counter-card_text">Vendors Onboard</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--==============================
    Portfolio Area  
==============================-->
<div class="portfolio-area-1 mb-5 mt-5 overflow-hidden">
  <!-- <div class="portfolio-shape1_1 shape-mockup jump d-lg-block d-none" data-top="0%" data-right="-10%">
    <img src="<?php echo base_url();?>assets/img/normal/portfolio-shape_1-1.png" alt="img">
  </div> -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-md-12">
        <div class="title-area text-center title-anim">
          <span class="sub-title style2" style="font-size: 16px;margin-bottom: 15px; margin-top: unset;">Testimonials</span>
          <h2 class="sec-title">Hear from our customers</h2>
        </div>
      </div>
    </div>
    <div class="row gx-90 gy-40 justify-content-center testimonials">
      <div class="col-lg-10 col-md-12">
        <?php if (isset($testimonial['video'])) { ?>
        <div class="row">
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
                <?php if(isset($testimonial['text']['6']->text)){ ?>
                <div class="responsive-container testimonial-text mt-4">
                  <span class="more"><?php echo $testimonial['text']['6']->text; ?></span>
                  <p class="author"><?php echo $testimonial['text']['6']->client_name; ?></p>
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
                <?php if(isset($testimonial['text']['7']->text)){ ?>
                <div class="responsive-container testimonial-text mt-4">
                  <span class="more1"><?php echo $testimonial['text']['7']->text; ?></span>
                  <p class="author"><?php echo $testimonial['text']['7']->client_name; ?></p>
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
    Media Area  
==============================-->

<section class="custom-banner blog-area-2 mt-5">
  <div class="container">
    <div class="title-area text-center title-anim">
      <h2 class="sec-title">Media</h2>
    </div>
    <div class="owl-carousel owl-theme d-block d-md-none">
      <div class="row gy-4 filter-active" style="position: relative;">
        <div class="col-md-6 col-lg-4 filter-item cat4" style="position: absolute; left: 0px; top: 0px;">
          <div class="project-box title-anim" style="perspective: 400px;">
            <div
              style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 212px 200.023px; transform: translate3d(0px, 0px, 0px); opacity: 1;">
              <div class="project-img global-img">
                <img src="<?php echo base_url();?>assets/images/media-1.png" alt="portfolio">
              </div>
            </div>
            <div
              style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 212px 58.9453px; transform: translate3d(0px, 0px, 0px); opacity: 1;">
              <div class="project-card-details">
                <p class="subtitle">March 05, 2021</p>
                <h3 class="title"><a target="_blank"
                    href="https://x.com/valueeducator/status/1664270650385772544?s=48&t=VLEp7xwuMgk94BQaN6gfog">LISTING
                    CEREMONY OF PARTY CRUISERS LTD.</a></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row gy-4 filter-active" style="position: relative;">
        <div class="col-md-6 col-lg-4 filter-item cat4 cat2 cat3" style="position: absolute; left: 448px; top: 0px;">
          <div class="project-box title-anim" style="perspective: 400px;">
            <div
              style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 212px 200.023px; transform: translate3d(0px, 0px, 0px); opacity: 1;">
              <div class="project-img global-img">
                <img src="<?php echo base_url();?>assets/images/media-2.png" alt="portfolio">
              </div>
            </div>
            <div
              style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 212px 58.9453px; transform: translate3d(0px, 0px, 0px); opacity: 1;">
              <div class="project-card-details">
                <p class="subtitle">March 05, 2021</p>
                <h3 class="title"><a target="_blank"
                    href="https://www.vogue.in/gallery/a-music-festival-inspired-wedding-in-the-thar-desert?fbclid=PAAaaM0ATCxfa5pYMXUH39dCiwaV9PzW6c76VVcs05NLRmhoOPIzJOR4YbK_U">Vows
                    Vachan - The Wedding Curators</a></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row gy-4 filter-active" style="position: relative;">
        <div class="col-md-6 col-lg-4 filter-item cat1 cat3" style="position: absolute; left: 896px; top: 0px;">
          <div class="project-box title-anim" style="perspective: 400px;">
            <div
              style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 212px 200.023px; transform: translate3d(0px, 0px, 0px); opacity: 1;">
              <div class="project-img global-img">
                <img src="<?php echo base_url();?>assets/images/media-3.png" alt="portfolio">
              </div>
            </div>
            <div
              style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 212px 58.9453px; transform: translate3d(0px, 0px, 0px); opacity: 1;">
              <div class="project-card-details">
                <p class="subtitle">March 05, 2021</p>
                <h3 class="title"><a target="_blank" href="https://www.youtube.com/watch?v=32EFHNHNGnY">Event Factory -
                    Corporate Impression Management Division</a></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-none d-md-block row gy-4 filter-active mb-60 d-" style="position: relative; height: 1083.88px;">
      <div class="col-md-6 col-lg-4 filter-item cat4" style="position: absolute; left: 0px; top: 0px;">
        <div class="project-box title-anim" style="perspective: 400px;">
          <div
            style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 212px 200.023px; transform: translate3d(0px, 0px, 0px); opacity: 1;">
            <div class="project-img global-img">
              <img src="<?php echo base_url();?>assets/images/media-1.png" alt="portfolio">
            </div>
          </div>
          <div
            style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 212px 58.9453px; transform: translate3d(0px, 0px, 0px); opacity: 1;">
            <div class="project-card-details">
              <p class="subtitle">March 05, 2021</p>
              <h3 class="title"><a target="_blank"
                  href="https://x.com/valueeducator/status/1664270650385772544?s=48&t=VLEp7xwuMgk94BQaN6gfog">LISTING
                  CEREMONY OF PARTY CRUISERS LTD.</a></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 filter-item cat4 cat2 cat3" style="position: absolute; left: 448px; top: 0px;">
        <div class="project-box title-anim" style="perspective: 400px;">
          <div
            style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 212px 200.023px; transform: translate3d(0px, 0px, 0px); opacity: 1;">
            <div class="project-img global-img">
              <img src="<?php echo base_url();?>assets/images/media-2.png" alt="portfolio">
            </div>
          </div>
          <div
            style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 212px 58.9453px; transform: translate3d(0px, 0px, 0px); opacity: 1;">
            <div class="project-card-details">
              <p class="subtitle">March 05, 2021</p>
              <h3 class="title"><a target="_blank"
                  href="https://www.vogue.in/gallery/a-music-festival-inspired-wedding-in-the-thar-desert?fbclid=PAAaaM0ATCxfa5pYMXUH39dCiwaV9PzW6c76VVcs05NLRmhoOPIzJOR4YbK_U">Vows
                  Vachan - The Wedding Curators</a></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 filter-item cat1 cat3" style="position: absolute; left: 896px; top: 0px;">
        <div class="project-box title-anim" style="perspective: 400px;">
          <div
            style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 212px 200.023px; transform: translate3d(0px, 0px, 0px); opacity: 1;">
            <div class="project-img global-img">
              <img src="<?php echo base_url();?>assets/images/media-3.png" alt="portfolio">
            </div>
          </div>
          <div
            style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 212px 58.9453px; transform: translate3d(0px, 0px, 0px); opacity: 1;">
            <div class="project-card-details">
              <p class="subtitle">March 05, 2021</p>
              <h3 class="title"><a target="_blank" href="https://www.youtube.com/watch?v=32EFHNHNGnY">Event Factory -
                  Corporate Impression Management Division</a></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="btn-wrap mt-40" style="justify-content: center;">
      <a href="<?php echo base_url();?>media" class="btn">More</a>
    </div>
  </div>
</section>


<!--==============================
    Blog Area 02 
    ==============================-->
<section class="blog-area-2 custom-banner space-top mb-5">
  <div class="container">
    <div class="title-area text-center title-anim">
      <span class="sub-title style2">Our Blogs Posts
      </span>
      <h2 class="sec-title">Latest from our Journal</h2>
    </div>
    <div class="owl-carousel owl-theme d-block d-md-none">
    <?php 
        if(isset($blog['0'])){        

            $formattedDate = '';
            $dateString = $blog['0']['blog_date'];
            $date = new DateTime($dateString);
            $formattedDate = $date->format('d M Y');
    ?>
      <div class="col-xl-3 col-lg-6 col-md-6 filter-item">
        <div class="blog-card style3 title-anim">
          <div class="blog-img">
            <img src="<?php echo $blog['0']['image_medium']; ?>" alt="<?php echo $blog['0']['image_alt']; ?>"
              alt="blog image">
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
            <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['0']['slug']; ?>"
              class="link-btn style2">Continue Reading <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php 
          if(isset($blog['1'])){        

              $formattedDate = '';
              $dateString = $blog['1']['blog_date'];
              $date = new DateTime($dateString);
              $formattedDate = $date->format('d M Y');
      ?>
      <div class="col-xl-3 col-lg-6 col-md-6 filter-item">
        <div class="blog-card style4 title-anim">
          <div class="blog-img">
            <img style="max-height: 200px;min-height: 200px;" src="<?php echo $blog['1']['image_medium']; ?>"
              alt="<?php echo $blog['1']['image_alt']; ?>">
          </div>
          <div class="blog-content">
            <div class="post-meta-item blog-meta">
              <a><?php echo strtoupper($blog['1']['author']); ?></a>
              <a><?php echo $formattedDate; ?></a>
              <a><?php echo $blog['1']['categories']; ?></a>
            </div>
            <h3 class="blog-title"  title="<?php echo $blog['1']['title']; ?>" style="display: block;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><a
                href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['1']['slug']; ?>"><?php echo $blog['1']['title']; ?></a>
            </h3>
            <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['1']['slug']; ?>"
              class="link-btn style2 mt-4">Continue Reading <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <?php } 
         if(isset($blog['2'])){        

            $formattedDate = '';
            $dateString = $blog['2']['blog_date'];
            $date = new DateTime($dateString);
            $formattedDate = $date->format('d M Y');
        ?>
      <div class="col-xl-3 col-lg-6 col-md-6 filter-item">
        <div class="blog-card style4 title-anim">
          <div class="blog-img">
            <img style="max-height: 200px;min-height: 200px;" src="<?php echo $blog['2']['image_medium']; ?>"
              alt="<?php echo $blog['2']['image_alt']; ?>">
          </div>
          <div class="blog-content">
            <div class="post-meta-item blog-meta">
              <a><?php echo strtoupper($blog['2']['author']); ?></a>
              <a><?php echo $formattedDate; ?></a>
              <a><?php echo $blog['2']['categories']; ?></a>
            </div>
            <h3 class="blog-title"  title="<?php echo $blog['2']['title']; ?>" style="display: block;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><a
                href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['2']['slug']; ?>"><?php echo $blog['2']['title']; ?></a>
            </h3>
            <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['2']['slug']; ?>"
              class="link-btn style2 mt-4">Continue Reading <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <?php } 
         if(isset($blog['3'])){        

            $formattedDate = '';
            $dateString = $blog['3']['blog_date'];
            $date = new DateTime($dateString);
            $formattedDate = $date->format('d M Y');
        ?>
      <div class="col-xl-3 col-lg-6 col-md-6 filter-item">
        <div class="blog-card style4 title-anim">
          <div class="blog-img">
            <img style="max-height: 200px;min-height: 200px;" src="<?php echo $blog['3']['image_medium']; ?>"
              alt="<?php echo $blog['3']['image_alt']; ?>">
          </div>
          <div class="blog-content">
            <div class="post-meta-item blog-meta">
              <a><?php echo strtoupper($blog['3']['author']); ?></a>
              <a><?php echo $formattedDate; ?></a>
              <a><?php echo $blog['3']['categories']; ?></a>
            </div>
            <h3 class="blog-title" title="<?php echo $blog['3']['title']; ?>" style="display: block;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><a
                href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['3']['slug']; ?>"><?php echo $blog['3']['title']; ?></a>
            </h3>
            <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['3']['slug']; ?>"
              class="link-btn style2 mt-4">Continue Reading <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <?php } 
         if(isset($blog['4'])){        

            $formattedDate = '';
            $dateString = $blog['4']['blog_date'];
            $date = new DateTime($dateString);
            $formattedDate = $date->format('d M Y');
        ?>
      <div class="col-xl-3 col-lg-6 col-md-6 filter-item">
        <div class="blog-card style4 title-anim">
          <div class="blog-img">
            <img style="max-height: 200px;min-height: 200px;" src="<?php echo $blog['4']['image_medium']; ?>"
              alt="<?php echo $blog['4']['image_alt']; ?>">
          </div>
          <div class="blog-content">
            <div class="post-meta-item blog-meta">
              <a><?php echo strtoupper($blog['4']['author']); ?></a>
              <a><?php echo $formattedDate; ?></a>
              <a><?php echo $blog['4']['categories']; ?></a>
            </div>
            <h3 class="blog-title"  title="<?php echo $blog['4']['title']; ?>" style="display: block;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><a
                href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['4']['slug']; ?>"><?php echo $blog['4']['title']; ?></a>
            </h3>
            <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['4']['slug']; ?>"
              class="link-btn style2 mt-4">Continue Reading <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <div class="row gy-40 masonary-active d-none d-md-block">
      <?php 
        if(isset($blog['0'])){        

            $formattedDate = '';
            $dateString = $blog['0']['blog_date'];
            $date = new DateTime($dateString);
            $formattedDate = $date->format('d M Y');
    ?>
      <div class="col-xl-6 col-lg-12 filter-item">
        <div class="blog-card style3 title-anim">
          <div class="blog-img">
            <img src="<?php echo $blog['0']['image_medium']; ?>" alt="<?php echo $blog['0']['image_alt']; ?>"
              alt="blog image">
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
            <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['0']['slug']; ?>"
              class="link-btn style2">Continue Reading <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php 
          if(isset($blog['1'])){        

              $formattedDate = '';
              $dateString = $blog['1']['blog_date'];
              $date = new DateTime($dateString);
              $formattedDate = $date->format('d M Y');
      ?>
      <div class="col-xl-3 col-lg-6 col-md-6 filter-item">
        <div class="blog-card style4 title-anim">
          <div class="blog-img">
            <img style="max-height: 200px;min-height: 200px;" src="<?php echo $blog['1']['image_medium']; ?>"
              alt="<?php echo $blog['1']['image_alt']; ?>">
          </div>
          <div class="blog-content">
            <div class="post-meta-item blog-meta">
              <a><?php echo strtoupper($blog['1']['author']); ?></a>
              <a><?php echo $formattedDate; ?></a>
              <a><?php echo $blog['1']['categories']; ?></a>
            </div>
            <h3 class="blog-title"  title="<?php echo $blog['1']['title']; ?>" style="display: block;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><a
                href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['1']['slug']; ?>"><?php echo $blog['1']['title']; ?></a>
            </h3>
            <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['1']['slug']; ?>"
              class="link-btn style2 mt-4">Continue Reading <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <?php } 
         if(isset($blog['2'])){        

            $formattedDate = '';
            $dateString = $blog['2']['blog_date'];
            $date = new DateTime($dateString);
            $formattedDate = $date->format('d M Y');
        ?>
      <div class="col-xl-3 col-lg-6 col-md-6 filter-item">
        <div class="blog-card style4 title-anim">
          <div class="blog-img">
            <img style="max-height: 200px;min-height: 200px;" src="<?php echo $blog['2']['image_medium']; ?>"
              alt="<?php echo $blog['2']['image_alt']; ?>">
          </div>
          <div class="blog-content">
            <div class="post-meta-item blog-meta">
              <a><?php echo strtoupper($blog['2']['author']); ?></a>
              <a><?php echo $formattedDate; ?></a>
              <a><?php echo $blog['2']['categories']; ?></a>
            </div>
            <h3 class="blog-title"  title="<?php echo $blog['2']['title']; ?>" style="display: block;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><a
                href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['2']['slug']; ?>"><?php echo $blog['2']['title']; ?></a>
            </h3>
            <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['2']['slug']; ?>"
              class="link-btn style2 mt-4">Continue Reading <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <?php } 
         if(isset($blog['3'])){        

            $formattedDate = '';
            $dateString = $blog['3']['blog_date'];
            $date = new DateTime($dateString);
            $formattedDate = $date->format('d M Y');
        ?>
      <div class="col-xl-3 col-lg-6 col-md-6 filter-item">
        <div class="blog-card style4 title-anim">
          <div class="blog-img">
            <img style="max-height: 200px;min-height: 200px;" src="<?php echo $blog['3']['image_medium']; ?>"
              alt="<?php echo $blog['3']['image_alt']; ?>">
          </div>
          <div class="blog-content">
            <div class="post-meta-item blog-meta">
              <a><?php echo strtoupper($blog['3']['author']); ?></a>
              <a><?php echo $formattedDate; ?></a>
              <a><?php echo $blog['3']['categories']; ?></a>
            </div>
            <h3 class="blog-title" title="<?php echo $blog['3']['title']; ?>" style="display: block;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><a
                href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['3']['slug']; ?>"><?php echo $blog['3']['title']; ?></a>
            </h3>
            <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['3']['slug']; ?>"
              class="link-btn style2 mt-4">Continue Reading <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <?php } 
         if(isset($blog['4'])){        

            $formattedDate = '';
            $dateString = $blog['4']['blog_date'];
            $date = new DateTime($dateString);
            $formattedDate = $date->format('d M Y');
        ?>
      <div class="col-xl-3 col-lg-6 col-md-6 filter-item">
        <div class="blog-card style4 title-anim">
          <div class="blog-img">
            <img style="max-height: 200px;min-height: 200px;" src="<?php echo $blog['4']['image_medium']; ?>"
              alt="<?php echo $blog['4']['image_alt']; ?>">
          </div>
          <div class="blog-content">
            <div class="post-meta-item blog-meta">
              <a><?php echo strtoupper($blog['4']['author']); ?></a>
              <a><?php echo $formattedDate; ?></a>
              <a><?php echo $blog['4']['categories']; ?></a>
            </div>
            <h3 class="blog-title"  title="<?php echo $blog['4']['title']; ?>" style="display: block;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><a
                href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['4']['slug']; ?>"><?php echo $blog['4']['title']; ?></a>
            </h3>
            <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['4']['slug']; ?>"
              class="link-btn style2 mt-4">Continue Reading <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <?php } ?>
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
  autoplayTimeout: 8000,
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
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