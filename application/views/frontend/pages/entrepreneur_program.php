<!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcrumb-bg.png">
  <!-- bg animated image/ -->
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-md-8">
        <div class="breadcumb-content">
          <h1 class="breadcumb-title">Entrepreneur Program</h1>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="breadcumb-menu text-md-end">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li class="active">Entrepreneur Program</li>
        </ul>
      </div>
    </div>

  </div>
</div>

<div class="space">
  <div class="container">
    <div class="row align-items-center justify-content-between">
      <div class="col-lg-6 mb-5">
        <div class="about-content-wrap title-anim text-center">
          <div class="title-area mb-0">
            <h2 class="sec-title">Entrepreneur Program</h2>
            <p class="hero-text title-animation"><a href="https://henna.freevision.me/wedding-planner/vendors/" target="_blank" class="btn style2">Know
            More</a></p>            
            <p class="sec-text">A platform for budding Entrepreneurs to boost, support, nurture any person with entrepreneurial qualities and develop a mutual beneficial arrangement. Not every potential entrepreneur has the opportunity to establish a successful business due to various reasons.</p>
            <p class="sec-text">PEP mentors and supports people who have been in the industry, tried their hand out but yet to taste success. Provide an individual, the opportunity to become an Entrepreneur. It is for those who have had lack of support or backend support to pursue their dream.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 custon-franchise">
        <div class="reservation-form-wrap">
          <div class="title-area text-center mb-30">
            <h2 class="sec-title">Contact Us</h2>
          </div>
          <form action="" method="POST"
            class="contact-form form-contact-white" id="franchiseForm">
            <div class="row">
              <input type="hidden" name="enquiry_for" value="Party Cruisers Limited" />
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
                <label>Work Profile*</label>
                <div class="style-4">
                  <select name="workProfile" id="workProfile" class="form-control style-border">
                    <option value="">Select Work Profile</option>
                    <option value="Business">Business</option>
                    <option value="Job">Job</option>
                  </select>
                  <div class="error" id="workProfileError"></div>
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