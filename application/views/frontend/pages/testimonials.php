<!--==============================
    Breadcumb
    ============================== -->
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcrumb-bg.png">
  <!-- bg animated image/ -->
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-md-8">
        <div class="breadcumb-content">
          <h1 class="breadcumb-title">Testimonials</h1>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="breadcumb-menu text-md-end">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li class="active">Testimonials</li>
        </ul>
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
    <div class="row justify-content-center">
      <div class="col-lg-10 col-md-12">
        <div class="title-area text-center title-anim">
          <span class="sub-title style2">Testimonials</span>
          <h2 class="sec-title">Hear from our customers</h2>
        </div>
      </div>
    </div>
    <div class="row gx-90 gy-40 justify-content-center success-story testimonials">
      <div class="col-lg-10 col-md-12">
        <ul class="nav nav-pills mb-5 success-story-scroller" id="pills-tab" role="tablist">
          <?php if (isset($testimonials)) {
                foreach ($testimonials as $index => $item) {
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
          <?php if (isset($testimonials)) {
            foreach ($testimonials as $index => $item) {
            $brand = str_replace(' ', '_', $item['brand']); ?>
          <div class="tab-pane fade <?php echo ($index == 0 ? 'show active' : ''); ?>" id="pills-<?php echo $brand; ?>"
            role="tabpanel" aria-labelledby="pills-<?php echo $brand; ?>-tab">
            <div class="row">
              <?php if(!empty($item['data']['video'])){
                foreach ($item['data']['video'] as $index => $video) { ?>
              <div class="col-md-6 small-fa-play">
                <div class="row mt-4">
                  <?php if(isset($video['0']->video_thumbnail)){?>
                  <div class="col-5 video-wrap">
                    <div class="responsive-container aspect-ratio-1-2">
                      <img
                        src="<?php echo (isset($video['0']->video_thumbnail) ? $video['0']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                    <a href="<?php echo $video['0']->video_url ?>" class="play-btn popup-video background-image">
                      <i class="fas fa-solid fa-play"></i>
                    </a>
                  </div>
                  <?php } ?>
                  <?php if(isset($video['1']->video_thumbnail)){?>
                  <div class="col-7 video-wrap">
                    <div class="responsive-container aspect-ratio-3-2">
                      <img
                        src="<?php echo (isset($video['1']->video_thumbnail) ? $video['1']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                    <a href="<?php echo $video['1']->video_url ?>" class="play-btn popup-video background-image">
                      <i class="fas fa-solid fa-play"></i>
                    </a>
                  </div>
                  <?php } ?>
                  <div class="col-12 mt-4">
                    <div class="row">
                      <?php if(isset($video['5']->video_thumbnail)){?>
                      <div class="col-7 video-wrap">
                        <div class="responsive-container aspect-ratio-1-3">
                          <img
                            src="<?php echo (isset($video['5']->video_thumbnail) ? $video['5']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                            alt="Image">
                        </div>
                        <a href="<?php echo $video['5']->video_url ?>" class="play-btn popup-video background-image">
                          <i class="fas fa-solid fa-play"></i>
                        </a>
                      </div>
                      <?php } ?>
                      <div class="col-5">
                        <div class="row">
                          <?php if(isset($video['6']->video_thumbnail)){?>
                          <div class="col-12 mb-4 video-wrap">
                            <div class="responsive-container aspect-ratio-1-2">
                              <img
                                src="<?php echo (isset($video['6']->video_thumbnail) ? $video['6']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                                alt="Image">
                            </div>
                            <a href="<?php echo $video['6']->video_url ?>"
                              class="play-btn popup-video background-image">
                              <i class="fas fa-solid fa-play"></i>
                            </a>
                          </div>
                          <?php } ?>
                          <?php if(isset($video['7']->video_thumbnail)){?>
                          <div class="col-12 video-wrap">
                            <div class="responsive-container aspect-ratio-1-2">
                              <img
                                src="<?php echo (isset($video['7']->video_thumbnail) ? $video['7']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                                alt="Image">
                            </div>
                            <a href="<?php echo $video['7']->video_url ?>"
                              class="play-btn popup-video background-image">
                              <i class="fas fa-solid fa-play"></i>
                            </a>
                          </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 small-fa-play">
                <div class="row mt-4">
                  <div class="col-12 mb-4">
                    <div class="row">
                      <?php if(isset($video['2']->video_thumbnail)){?>
                      <div class="col-7 video-wrap">
                        <div class="responsive-container aspect-ratio-1-3">
                          <img
                            src="<?php echo (isset($video['2']->video_thumbnail) ? $video['2']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                            alt="Image">
                        </div>
                        <a href="<?php echo $video['2']->video_url ?>" class="play-btn popup-video background-image">
                          <i class="fas fa-solid fa-play"></i>
                        </a>
                      </div>
                      <?php } ?>
                      <div class="col-5">
                        <div class="row">
                          <?php if(isset($video['3']->video_thumbnail)){?>
                          <div class="col-12 mb-4 video-wrap">
                            <div class="responsive-container aspect-ratio-1-2">
                              <img
                                src="<?php echo (isset($video['3']->video_thumbnail) ? $video['3']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                                alt="Image">
                            </div>
                            <a href="<?php echo $video['3']->video_url ?>"
                              class="play-btn popup-video background-image">
                              <i class="fas fa-solid fa-play"></i>
                            </a>
                          </div>
                          <?php } ?>
                          <?php if(isset($video['4']->video_thumbnail)){?>
                          <div class="col-12 video-wrap">
                            <div class="responsive-container aspect-ratio-1-2">
                              <img
                                src="<?php echo (isset($video['4']->video_thumbnail) ? $video['4']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                                alt="Image">
                            </div>
                            <a href="<?php echo $video['4']->video_url ?>"
                              class="play-btn popup-video background-image">
                              <i class="fas fa-solid fa-play"></i>
                            </a>
                          </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php if(isset($video['8']->video_thumbnail)){?>
                  <div class="col-5 video-wrap">
                    <div class="responsive-container aspect-ratio-1-2">
                      <img
                        src="<?php echo (isset($video['8']->video_thumbnail) ? $video['8']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                    <a href="<?php echo $video['8']->video_url ?>" class="play-btn popup-video background-image">
                      <i class="fas fa-solid fa-play"></i>
                    </a>
                  </div>
                  <?php } ?>
                  <?php if(isset($video['9']->video_thumbnail)){?>
                  <div class="col-7 video-wrap">
                    <div class="responsive-container aspect-ratio-3-2">
                      <img
                        src="<?php echo (isset($video['9']->video_thumbnail) ? $video['9']->video_thumbnail : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                    <a href="<?php echo $video['9']->video_url ?>" class="play-btn popup-video background-image">
                      <i class="fas fa-solid fa-play"></i>
                    </a>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <?php } } ?>
              <div class="col-md-12">
                <div class="row mt-4">
                  <?php  if(!empty($item['data']['text'])){
                foreach ($item['data']['text'] as $index => $text) { ?>
                  <div class="col-md-3 col-sm-12 mb-4">
                    <?php if(isset($text->text)){ ?>
                    <div class="responsive-container testimonial-text">
                      <span class="more"><?php echo $text->text; ?></span>
                      <p class="author"><?php echo $text->client_name; ?></p>
                    </div>
                    <?php } ?>
                  </div>
                  <?php } } ?>
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
    Contact Area  
==============================-->
<?php include 'contact_form.php'; ?>