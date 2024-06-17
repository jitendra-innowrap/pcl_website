<!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcrumb-bg.png">
  <!-- bg animated image/ -->
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-md-8">
        <div class="breadcumb-content">
          <h1 class="breadcumb-title">Carrer</h1>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="breadcumb-menu text-md-end">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li class="active">Carrer</li>
        </ul>
      </div>
    </div>

  </div>
</div>

<div class="space-top">
  <div class="container">
    <div class="row flex-row-reverse align-items-center justify-content-between">
      <div class="col-lg-12">
        <div class="about-content-wrap title-anim text-center">
          <div class="title-area mb-0">
            <h2 class="sec-title">Carrer</h2>
            <p class="hero-text title-animation"><a href="https://henna.freevision.me/wedding-planner/vendors/"
                target="_blank" class="btn style2">Know
                More</a></p>
            <p class="sec-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="space">
    <div class="container">
      <div class="row align-items-center flex-row-reverse justify-content-between">
        <div class="col-lg-5 mb-5">
          <div class="reservation-thumb">
            <img class="w-100" src="<?php echo base_url();?>assets/images/Franchise.jpg" alt="img">
          </div>
        </div>
        <div class="col-lg-7 custom-franchise">
          <div class="reservation-form-wrap">
            <div class="title-area text-center mb-30">
              <h2 class="sec-title">Contact Us</h2>
            </div>
            <h4 class="form-messages"></h4>
            <form method="POST" class="contact-form form-contact-white" id="CarrerForm">
              <div class="row">
                <input type="hidden" name="enquiry_for" value="Carrer" />
                <div class="col-lg-6">
                  <label>Full Name*</label>
                  <div class="form-group style-4 form-icon-left">
                    <i class="far fa-user"></i>
                    <input type="text" class="form-control style-border" name="name" id="name"
                      placeholder="Enter Full Name">
                    <div class="error" id="nameError"></div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <label>Contact No*</label>
                  <div class="d-flex form-group style-4 form-icon-left" style="margin:0px;">
                    <select id="countryCode" name="countryCode" class="style-4 form-control style-border"
                      style="max-width: 70px;padding: 0px 5px;">
                      <?php include 'country_code.php'; ?>
                    </select>
                    <div class="form-group style-4 form-icon-left">
                      <i class="fas fa-phone-alt"></i>
                      <input type="number" class="form-control style-border" name="contact" id="contact"
                        placeholder="Enter Contact">
                      <div class="error" id="contactError"></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <label>Email*</label>
                  <div class="form-group style-4 form-icon-left">
                    <i class="far fa-envelope"></i>
                    <input type="text" class="form-control style-border" name="email" id="email"
                      placeholder="Enter Email Address">
                    <div class="error" id="emailError"></div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <label>Your Location*</label>
                  <div class="form-group style-4 form-icon-left">
                    <i class="fas fa-map-marker-alt" style="margin-right: 8px;"></i>
                    <input type="text" class="form-control style-border" name="location" id="location"
                      placeholder="Enter Your Location">
                    <div class="error" id="locationError"></div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <label>CV*</label>
                  <div class="form-group style-4 ">
                    <input type="file" style="padding: 0 30px 0 12px;" class="form-control style-border" accept="application/pdf" name="cv" id="cv">
                    <div class="error" id="cvError"></div>
                  </div>
                </div>
              </div>
              <div class="form-btn col-12 text-center mt-5">
                <button type="submit" class="btn">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>