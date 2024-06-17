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
<div class="mt-4 mb-4">
  <div class="container">
    <div class="row flex-row-reverse align-items-center justify-content-between">
      <div class="col-lg-6">
        <div class="about-thumb mb-5 mb-lg-0 text-lg-end text-center img-anim"
          style="display:flex;align-items: center;justify-content: center;">
          <img class="about-img-1" style="width:100%;max-width:500px;"
            src="<?php echo base_url();?>assets/images/logo/vivaah.png" alt="img">
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
          <div class="social-btn style2 justify-content-center mt-4">
            <a href="https://www.facebook.com/Vivaahweddingdecorstylist" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/houseofvivaah?igsh=d3JjNzZmNHc3emRk" target="_blank"><i class="fab fa-instagram"></i></a>
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
    <div class="title-area text-center title-anim">
      <span class="sub-title style2">Check out some of our</span>
      <h2 class="sec-title">Success Story</h2>
    </div>
    <div class="row gx-90 gy-40 justify-content-center success-story">
      <div class="col-md-12">
        <ul class="nav nav-pills mb-5 success-story-scroller" id="pills-tab" role="tablist">
          <?php if (isset($success_story)) {
                foreach ($success_story as $index => $item) { ?>
          <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo ($index == 0 ? 'active' : ''); ?>"
              id="pills-<?php echo $item['category_id']; ?>-tab" data-bs-toggle="pill"
              data-bs-target="#pills-<?php echo $item['category_id']; ?>" type="button" role="tab"
              aria-controls="pills-<?php echo $item['category_id']; ?>"
              aria-selected="<?php echo ($index == 0 ? 'true' : 'false'); ?>"><?php echo $item['category_name']; ?></button>
          </li>
          <?php }
            } ?>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <?php if (isset($success_story)) {
    foreach ($success_story as $index => $item) {  ?>
          <div class="tab-pane fade <?php echo ($index == 0 ? 'show active' : ''); ?>"
            id="pills-<?php echo $item['category_id']; ?>" role="tabpanel"
            aria-labelledby="pills-<?php echo $item['category_id']; ?>-tab">
            <?php  foreach ($item['case_studies'] as $index => $photo) { ?>
            <div class="row">
              <div class="col-lg-8 mt-4 col-md-12">
                <div class="row">
                  <?php if(isset($photo['0']['image'])){?>
                  <div class="col-4">
                    <div class="responsive-container aspect-ratio-1-1"><a
                        href="<?php echo base_url();?>success-story?id=<?php echo $photo['0']['id']; ?>">
                        <img
                          src="<?php echo (isset($photo['0']['image']) ? $photo['0']['image'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </a></div>
                  </div>
                  <?php } ?>
                  <?php if(isset($photo['1']['image'])){?>
                  <div class="col-4">
                    <div class="responsive-container aspect-ratio-1-1"><a
                        href="<?php echo base_url();?>success-story?id=<?php echo $photo['1']['id']; ?>">
                        <img
                          src="<?php echo (isset($photo['1']['image']) ? $photo['1']['image'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </a></div>
                  </div>
                  <?php } ?>
                  <?php if(isset($photo['2']['image'])){?>
                  <div class="col-4">
                    <div class="responsive-container aspect-ratio-1-1"><a
                        href="<?php echo base_url();?>success-story?id=<?php echo $photo['2']['id']; ?>">
                        <img
                          src="<?php echo (isset($photo['2']['image']) ? $photo['2']['image'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </a></div>
                  </div>
                  <?php } ?>
                  <?php if(isset($photo['4']['image'])){?>
                  <div class="col-12 mt-4">
                    <div class="responsive-container aspect-ratio-2-1"><a
                        href="<?php echo base_url();?>success-story?id=<?php echo $photo['4']['id']; ?>">
                        <img
                          src="<?php echo (isset($photo['4']['image']) ? $photo['4']['image'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </a></div>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-4 mt-4 col-md-12">
                <div class="row">
                  <?php if(isset($photo['3']['image'])){?>
                  <div class="col-lg-12 col-6">
                    <div class="responsive-container aspect-ratio-1-2"><a
                        href="<?php echo base_url();?>success-story?id=<?php echo $photo['3']['id']; ?>">
                        <img
                          src="<?php echo (isset($photo['3']['image']) ? $photo['3']['image'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </a></div>
                  </div>
                  <?php } ?>
                  <?php if(isset($photo['5']['image'])){?>
                  <div class="col-lg-12 mt-4 col-6">
                    <div class="responsive-container aspect-ratio-3-2"><a
                        href="<?php echo base_url();?>success-story?id=<?php echo $photo['5']['id']; ?>">
                        <img
                          src="<?php echo (isset($photo['5']['image']) ? $photo['5']['image'] : 'assets/images/logo/Party Cruisers Limited black.png') ?>"
                          alt="Image">
                      </a></div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
          <?php } } ?>

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

<div class="contact-area-1 space overflow-hidden" style="background-color: #543718;">
  <div class="contact-shape1_1 shape-mockup jump d-lg-block d-none" data-top="0%" data-right="-8%">
    <img src="<?php echo base_url();?>assets/img/normal/contact-shape_1-1.png" alt="img">
  </div>
  <div class="contact-shape1_2 shape-mockup jump-reverse d-lg-block d-none" data-bottom="-3%" data-left="-12%">
    <img src="<?php echo base_url();?>assets/img/normal/contact-shape_1-2.png" alt="img">
  </div>
  <div class="container-fluid p-0">
    <div class="contact-form-area space">
      <div class="title-area text-center title-anim">
        <span class="sub-title style2 text-white">LET US KNOW IF YOU COMING
        </span>
        <h2 class="sec-title text-white">WE CANT WAIT TO SEE YOU!</h2>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <h4 class="form-messages"></h4>
          <form method="POST" class="contact-form form-contact-black" id="houseOfVivahForm">
            <div class="row">
              <input type="hidden" name="enquiry_for" value="House of vivah" />
              <div class="col-lg-4">
                <label>Full Name*</label>
                <div class="form-group form-icon-left">
                  <i class="far fa-user"></i>
                  <input type="text" class="form-control style-border" name="name" id="name"
                    placeholder="Enter Full Name">
                  <div class="error" id="nameError"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <label>Contact No*</label>
                <div class="d-flex form-group form-icon-left" style="margin:0px;">
                  <select id="countryCode" name="countryCode" class="form-control style-border"
                    style="max-width: 70px;padding: 0px 5px;">
                    <?php include 'country_code.php'; ?>
                  </select>
                  <div class="form-group form-icon-left">
                    <i class="fas fa-phone-alt"></i>
                    <input type="number" class="form-control style-border" name="contact" id="contact"
                      placeholder="Enter Contact">
                    <div class="error" id="contactError"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <label>Email*</label>
                <div class="form-group form-icon-left">
                  <i class="far fa-envelope"></i>
                  <input type="text" class="form-control style-border" name="email" id="email"
                    placeholder="Enter Email Address">
                  <div class="error" id="emailError"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <label>Your Location*</label>
                <div class="form-group form-icon-left">
                  <i class="fas fa-map-marker-alt" style="margin-right: 8px;"></i>
                  <input type="text" class="form-control style-border" name="location" id="location"
                    placeholder="Enter Location of Event">
                  <div class="error" id="locationError"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <label>Date of Event*</label>
                <div class="form-group form-icon-left">
                  <i class="far fa-calendar"></i>
                  <input type="date" class="form-control style-border date" name="date" id="date">
                  <div class="error" id="dateError"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <label>Venue of the Event*</label>
                <div class="form-group form-icon-left">
                  <i class="fas fa-map-marker-alt" style="margin-right: 8px;"></i>
                  <input type="text" class="form-control style-border" name="venue" id="venue"
                    placeholder="Enter Venue of the Event">
                  <div class="error" id="venueError"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <label>Event*</label>
                <div class="form-group form-icon-left">
                  <select name="event" id="event" class="form-control style-border">
                    <option value="">Select Event</option>
                    <option value="Engagement">Engagement</option>
                    <option value="Haldi">Haldi</option>
                    <option value="Mehendi">Mehendi</option>
                    <option value="Sangeet">Sangeet</option>
                    <option value="Wedding">Wedding</option>
                    <option value="All the Above">All the Above</option>
                  </select>
                  <div class="error" id="eventError"></div>
                </div>
              </div>
            </div>
            <div class="form-btn col-12 text-center">
              <button type="submit" class="btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>