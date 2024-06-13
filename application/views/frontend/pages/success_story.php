<!--==============================
    Breadcumb
    ============================== -->
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcrumb-bg.png">
  <!-- bg animated image/ -->
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-md-8">
        <div class="breadcumb-content">
          <h1 class="breadcumb-title">
            <?php echo isset($success_stories['0']['brand']) ? $success_stories['0']['brand'] :'Success Story';?></h1>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="breadcumb-menu text-md-end">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="active">Success Story</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!--==============================
    Blog Area  
    ==============================-->
<section class="blog-area space-top space-extra-bottom">
  <div class="container page-layout right-sidebar">
    <div class="row gx-40 blog-page-with-sideba">
      <div class="col-xxl-12 success-story">
        <div class="row gy-4 all-posts-wrappe  justify-content-center">
          <div class="col-12 col-md-10 single-post-item">
            <?php if (isset($success_stories)) {
          foreach ($success_stories as $index => $item) { ?>
            <article class="post-details blog-single" style="text-align: center;">
              <div class="post-img blog-img blog-custom-img">
                <img class="w-100" src="<?php echo isset($item['image']) ? $item['image'] :'';?>"
                  alt="<?php echo $item['image_alt']; ?>">
              </div>
              <h3 class="post-title blog-title" style="margin-bottom: 0px;"><?php echo isset($item['client_name']) ? $item['client_name'] :'';?>
              </h3>
              <div class="post-contents with-thum-img blog-content">
                <div class="post-meta-item blog-meta">
                <h6><?php echo isset($item['categories']) ? $item['categories'] :'';?> - <?php echo isset($success_stories['0']['brand']) ? $success_stories['0']['brand'] :'Success Story';?></h6>
                </div>
                <div class="post-content blog-text">
                  <?php echo isset($item['content']) ? $item['content'] :'';?>
                </div>
              </div>
            </article>
            <?php if (isset($item['photos'])) {
            foreach ($item['photos'] as $index => $photo) { ?>
            <div class="row">
              <div class="col-lg-8 mt-4 col-md-12">
                <div class="row">
                  <?php if(isset($photo['0']['photo'])){?>
                  <div class="col-4">
                    <div class="portfolio-thumb fade_left">
                      <a class="popup-image icon-btn"
                        href="<?php echo (isset($photo['0']['photo']) ? $photo['0']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"><i
                          class="far fa-eye"></i></a>
                      <div class="responsive-container img-anim aspect-ratio-1-1">
                        <img
                          src="<?php echo (isset($photo['0']['photo']) ? $photo['0']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <?php if(isset($photo['1']['photo'])){?>
                  <div class="col-4">
                    <div class="portfolio-thumb fade_left">
                      <a class="popup-image icon-btn"
                        href="<?php echo (isset($photo['1']['photo']) ? $photo['1']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"><i
                          class="far fa-eye"></i></a>
                      <div class="responsive-container img-anim aspect-ratio-1-1">
                        <img
                          src="<?php echo (isset($photo['1']['photo']) ? $photo['1']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <?php if(isset($photo['2']['photo'])){?>
                  <div class="col-4">
                    <div class="portfolio-thumb fade_left">
                      <a class="popup-image icon-btn"
                        href="<?php echo (isset($photo['2']['photo']) ? $photo['2']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"><i
                          class="far fa-eye"></i></a>
                      <div class="responsive-container img-anim aspect-ratio-1-1">
                        <img
                          src="<?php echo (isset($photo['2']['photo']) ? $photo['2']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <?php if(isset($photo['4']['photo'])){?>
                  <div class="col-12 mt-4">
                    <div class="portfolio-thumb fade_left">
                      <a class="popup-image icon-btn"
                        href="<?php echo (isset($photo['4']['photo']) ? $photo['4']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"><i
                          class="far fa-eye"></i></a>
                      <div class="responsive-container img-anim aspect-ratio-2-1">
                        <img
                          src="<?php echo (isset($photo['4']['photo']) ? $photo['4']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-4 mt-4 col-md-12">
                <div class="row">
                  <?php if(isset($photo['3']['photo'])){?>
                  <div class="col-lg-12 col-6">
                    <div class="portfolio-thumb fade_left">
                      <a class="popup-image icon-btn"
                        href="<?php echo (isset($photo['3']['photo']) ? $photo['3']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"><i
                          class="far fa-eye"></i></a>
                      <div class="responsive-container img-anim aspect-ratio-1-2">
                        <img
                          src="<?php echo (isset($photo['3']['photo']) ? $photo['3']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <?php if(isset($photo['5']['photo'])){?>
                  <div class="col-lg-12 col-6 mt-4">
                    <div class="portfolio-thumb fade_left">
                      <a class="popup-image icon-btn"
                        href="<?php echo (isset($photo['5']['photo']) ? $photo['5']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"><i
                          class="far fa-eye"></i></a>
                      <div class="responsive-container img-anim aspect-ratio-3-2">
                        <img
                          src="<?php echo (isset($photo['5']['photo']) ? $photo['5']['photo'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </div>
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
                  <?php if(isset($video['4']['video_thumbnail_url'])){?>
                  <div class="col-12 mt-4 mb-4 video-wrap">
                    <div class="responsive-container aspect-ratio-2-1 ">
                      <img
                        src="<?php echo (isset($video['4']['video_thumbnail_url']) ? $video['4']['video_thumbnail_url'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                    <a href="<?php echo $video['4']['video_url']; ?>" class="play-btn popup-video background-image">
                      <i class="fas fa-solid fa-play"></i>
                    </a>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-4 col-md-12">
                <div class="row">
                  <?php if(isset($video['3']['video_thumbnail_url'])){?>
                  <div class="col-lg-12 col-6 mb-4 video-wrap">
                    <div class="responsive-container aspect-ratio-1-2 ">
                      <img
                        src="<?php echo (isset($video['3']['video_thumbnail_url']) ? $video['3']['video_thumbnail_url'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                        alt="Image">
                    </div>
                    <a href="<?php echo $video['3']['video_url']; ?>" class="play-btn popup-video background-image">
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
            <?php } } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>