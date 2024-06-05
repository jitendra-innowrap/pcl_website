<!--==============================
    Breadcumb
    ============================== -->
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcrumb-bg.png">
  <!-- bg animated image/ -->
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-md-8">
        <div class="breadcumb-content">
          <h1 class="breadcumb-title">House of Vivaah</h1>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="breadcumb-menu text-md-end">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li class="active">House of Vivaah</li>
        </ul>
      </div>
    </div>

  </div>
</div>

<!--==============================
    About Area  
    ==============================-->
<div class="space">
  <div class="container">
    <div class="row flex-row-reverse align-items-center justify-content-between">
      <div class="col-lg-6">
        <div class="about-thumb mb-5 mb-lg-0 text-lg-end text-center fade_left">
          <img class="about-img-1" src="<?php echo base_url();?>assets/images/logo/vivaah logo 1.png" alt="img">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="about-content-wrap title-anim text-center">
          <div class="title-area mb-0">
            <span class="sub-title style2">More About Us</span>
            <h2 class="sec-title"> House of Vivaah</h2>
            <h4 class="sec-title"> Design | Décor | Production</h4>
            <p class="sec-text">Explore unparalleled luxury weddings with House of Vivaah, a flagship brand of Party
              Cruisers Ltd., offering full-service wedding decor, ambiance styling, innovative wedding designs &
              seamless production.</p>
          </div>
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
        <?php if (isset($testimonial)) { ?>
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <?php if(isset($testimonial['video_chunks'])){
              foreach ($testimonial['video_chunks'] as $item){ ?>
            <div class="row small-fa-play">
              <?php if(isset($item['0']['video_thumbnail'])){?>
              <div class="col-5 video-wrap">
                <div class="responsive-container aspect-ratio-1-2">
                  <img
                    src="<?php echo (isset($item['0']['video_thumbnail']) ? $item['0']['video_thumbnail'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                    alt="Image">
                </div>
                <a href="<?php echo $item['0']['video_url']; ?>" class="play-btn popup-video background-image">
                  <i class="fas fa-solid fa-play"></i>
                </a>
              </div>
              <?php } ?>
              <?php if(isset($item['1']['video_thumbnail'])){?>
              <div class="col-7 video-wrap">
                <div class="responsive-container aspect-ratio-3-2">
                  <img
                    src="<?php echo (isset($item['1']['video_thumbnail']) ? $item['1']['video_thumbnail'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                    alt="Image">
                </div>
                <a href="<?php echo $item['1']['video_url']; ?>" class="play-btn popup-video background-image">
                  <i class="fas fa-solid fa-play"></i>
                </a>
              </div>
              <?php } ?>
              <div class="col-12 mt-4 mb-4">
                <div class="row">
                  <?php if(isset($item['2']['video_thumbnail'])){?>
                  <div class="col-7 video-wrap">
                    <div class="responsive-container aspect-ratio-1-3">
                      <img
                        src="<?php echo (isset($item['2']['video_thumbnail']) ? $item['2']['video_thumbnail'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                    <a href="<?php echo $item['2']['video_url']; ?>" class="play-btn popup-video background-image">
                      <i class="fas fa-solid fa-play"></i>
                    </a>
                  </div>
                  <?php } ?>
                  <div class="col-5">
                    <div class="row">
                      <?php if(isset($item['3']['video_thumbnail'])){?>
                      <div class="col-12 mb-4 video-wrap">
                        <div class="responsive-container aspect-ratio-1-2">
                          <img
                            src="<?php echo (isset($item['3']['video_thumbnail']) ? $item['3']['video_thumbnail'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                            alt="Image">
                        </div>
                        <a href="<?php echo $item['3']['video_url']; ?>" class="play-btn popup-video background-image">
                          <i class="fas fa-solid fa-play"></i>
                        </a>
                      </div>
                      <?php } ?>
                      <?php if(isset($item['4']['video_thumbnail'])){?>
                      <div class="col-12 video-wrap">
                        <div class="responsive-container aspect-ratio-1-2">
                          <img
                            src="<?php echo (isset($item['4']['video_thumbnail']) ? $item['4']['video_thumbnail'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                            alt="Image">
                        </div>
                        <a href="<?php echo $item['4']['video_url']; ?>" class="play-btn popup-video background-image">
                          <i class="fas fa-solid fa-play"></i>
                        </a>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php if(isset($item['5']['video_thumbnail'])){?>
              <div class="col-12 mb-4 video-wrap">
                <div class="responsive-container aspect-ratio-4-2">
                  <img
                    src="<?php echo (isset($item['5']['video_thumbnail']) ? $item['5']['video_thumbnail'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                    alt="Image">
                </div>
                <a href="<?php echo $item['5']['video_url']; ?>" class="play-btn popup-video background-image">
                  <i class="fas fa-solid fa-play"></i>
                </a>
              </div>
              <?php } ?>
            </div>
            <?php  }
              } ?>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="row">
              <div class="col-md-6 col-sm-12 mb-4">
                <?php if(isset($testimonial['first_half'])){
                    foreach ($testimonial['first_half'] as $item){ ?>
                <div class="responsive-container testimonial-text mb-4">
                  <span class="more"><?php echo $item->text; ?></span>
                  <p class="author"><?php echo $item->client_name; ?></p>
                </div>
                <?php  }
                  } ?>
              </div>
              <div class="col-md-6 col-sm-12 mb-4">
                <?php if(isset($testimonial['second_half'])){
                    foreach ($testimonial['second_half'] as $item){ ?>
                <div class="responsive-container testimonial-text mb-4">
                  <span class="more"><?php echo $item->text; ?></span>
                  <p class="author"><?php echo $item->client_name; ?></p>
                </div>
                <?php  }
                  } ?>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
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
      <div class="col-12 col-md-10">
        <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
          <?php if (isset($success_stories)) {
                foreach ($success_stories as $index => $item) { ?>
          <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo ($index == 0 ? 'active' : ''); ?>"
              id="pills-<?php echo $item['id']; ?>-tab" data-bs-toggle="pill"
              data-bs-target="#pills-<?php echo $item['id']; ?>" type="button" role="tab"
              aria-controls="pills-<?php echo $item['id']; ?>"
              aria-selected="<?php echo ($index == 0 ? 'true' : 'false'); ?>"><?php echo $item['client_name']; ?></button>
          </li>
          <?php }
            } ?>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <?php if (isset($success_stories)) {
          foreach ($success_stories as $index => $item) { ?>
          <div class="tab-pane fade <?php echo ($index == 0 ? 'show active' : ''); ?>"
            id="pills-<?php echo $item['id']; ?>" role="tabpanel"
            aria-labelledby="pills-<?php echo $item['id']; ?>-tab">
            <article class="post-details blog-single" style="text-align: center;">
              <div class="post-img blog-img blog-custom-img">
                <img class="w-100" src="<?php echo isset($item['image']) ? $item['image'] :'';?>"
                  alt="<?php echo $item['image_alt']; ?>">
              </div>
              <div class="post-contents with-thum-img blog-content">
                <div class="post-meta-item blog-meta">
                  <a><?php echo isset($item['categories']) ? $item['categories'] :'';?></a>
                </div>
                <div class="post-content blog-text">
                  <?php echo isset($item['content']) ? $item['content'] :'';?>
                </div>
              </div>
            </article>
            <?php if (isset($item['photos'])) {
            foreach ($item['photos'] as $index => $photo) { ?>
            <div class="row mt-4">
              <div class="col-lg-8 col-md-12">
                <div class="row">
                  <?php if(isset($photo['0']['photo'])){?>
                  <div class="col-4">
                    <div class="responsive-container aspect-ratio-1-1">
                      <img
                        src="<?php echo (isset($photo['0']['photo']) ? $photo['0']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                  </div>
                  <?php } ?>
                  <?php if(isset($photo['1']['photo'])){?>
                  <div class="col-4">
                    <div class="responsive-container aspect-ratio-1-1">
                      <img
                        src="<?php echo (isset($photo['1']['photo']) ? $photo['1']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                  </div>
                  <?php } ?>
                  <?php if(isset($photo['2']['photo'])){?>
                  <div class="col-4">
                    <div class="responsive-container aspect-ratio-1-1">
                      <img
                        src="<?php echo (isset($photo['2']['photo']) ? $photo['2']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                  </div>
                  <?php } ?>
                  <?php if(isset($photo['3']['photo'])){?>
                  <div class="col-12 mt-4">
                    <div class="responsive-container aspect-ratio-2-1">
                      <img
                        src="<?php echo (isset($photo['3']['photo']) ? $photo['3']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-4 col-md-12">
                <div class="row">
                  <?php if(isset($photo['4']['photo'])){?>
                  <div class="col-lg-12 col-6 mb-4">
                    <div class="responsive-container aspect-ratio-1-2">
                      <img
                        src="<?php echo (isset($photo['4']['photo']) ? $photo['4']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                  </div>
                  <?php } ?>
                  <?php if(isset($photo['5']['photo'])){?>
                  <div class="col-lg-12 col-6">
                    <div class="responsive-container aspect-ratio-3-2">
                      <img
                        src="<?php echo (isset($photo['5']['photo']) ? $photo['5']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <?php } } ?>
            <?php if (isset($item['video_thumbnail']) && isset($item['video_url'])) { ?>
            <div class="video-wrap mt-4">
              <div class="video-custom-thumb">
                <img src="<?php echo $item['video_thumbnail']; ?>" alt="img">
              </div>
              <a href="<?php echo $item['video_url']; ?>" class="play-btn popup-video background-image">
                <i class="fas fa-solid fa-play"></i>
              </a>
            </div>
            <?php } ?>
            <?php if (isset($item['videos'])) {
            foreach ($item['videos'] as $index => $video) { ?>
            <div class="row mt-4 small-fa-play">
              <div class="col-lg-8 col-md-12">
                <div class="row">
                  <?php if(isset($video['0']['video_thumbnail_url'])){?>
                  <div class="col-4 video-wrap">
                    <div class="responsive-container aspect-ratio-1-1 ">
                      <img
                        src="<?php echo (isset($video['0']['video_thumbnail_url']) ? $video['0']['video_thumbnail_url'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                    <a href="<?php echo $video['0']['video_url']; ?>" class="play-btn popup-video background-image">
                      <i class="fas fa-solid fa-play"></i>
                    </a>
                  </div>
                  <?php } ?>
                  <?php if(isset($video['1']['video_thumbnail_url'])){?>
                  <div class="col-4 video-wrap">
                    <div class="responsive-container aspect-ratio-1-1 ">
                      <img
                        src="<?php echo (isset($video['1']['video_thumbnail_url']) ? $video['1']['video_thumbnail_url'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                    <a href="<?php echo $video['1']['video_url']; ?>" class="play-btn popup-video background-image">
                      <i class="fas fa-solid fa-play"></i>
                    </a>
                  </div>
                  <?php } ?>
                  <?php if(isset($video['2']['video_thumbnail_url'])){?>
                  <div class="col-4 video-wrap">
                    <div class="responsive-container aspect-ratio-1-1 ">
                      <img
                        src="<?php echo (isset($video['2']['video_thumbnail_url']) ? $video['2']['video_thumbnail_url'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                    <a href="<?php echo $video['2']['video_url']; ?>" class="play-btn popup-video background-image">
                      <i class="fas fa-solid fa-play"></i>
                    </a>
                  </div>
                  <?php } ?>
                  <?php if(isset($video['3']['video_thumbnail_url'])){?>
                  <div class="col-12 mt-4 mb-4 video-wrap">
                    <div class="responsive-container aspect-ratio-2-1 ">
                      <img
                        src="<?php echo (isset($video['3']['video_thumbnail_url']) ? $video['3']['video_thumbnail_url'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                    <a href="<?php echo $video['3']['video_url']; ?>" class="play-btn popup-video background-image">
                      <i class="fas fa-solid fa-play"></i>
                    </a>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-4 col-md-12">
                <div class="row">
                  <?php if(isset($video['4']['video_thumbnail_url'])){?>
                  <div class="col-lg-12 col-6 mb-4 video-wrap">
                    <div class="responsive-container aspect-ratio-1-2 ">
                      <img
                        src="<?php echo (isset($video['4']['video_thumbnail_url']) ? $video['4']['video_thumbnail_url'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                    <a href="<?php echo $video['4']['video_url']; ?>" class="play-btn popup-video background-image">
                      <i class="fas fa-solid fa-play"></i>
                    </a>
                  </div>
                  <?php } ?>
                  <?php if(isset($video['5']['video_thumbnail_url'])){?>
                  <div class="col-lg-12 col-6 video-wrap">
                    <div class="responsive-container aspect-ratio-3-2 ">
                      <img
                        src="<?php echo (isset($video['5']['video_thumbnail_url']) ? $video['5']['video_thumbnail_url'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                    <a href="<?php echo $video['5']['video_url']; ?>" class="play-btn popup-video background-image">
                      <i class="fas fa-solid fa-play"></i>
                    </a>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <?php } } ?>
          </div>
          <?php } } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!--==============================
    Contact Area  
==============================-->
<?php include 'contact_form.php'; ?>