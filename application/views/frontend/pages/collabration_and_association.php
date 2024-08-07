<!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper bg-gradient">
  <!-- bg animated image/ -->
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-md-8">
        <div class="breadcumb-content">
          <h1 class="breadcumb-title">Collaboration & Association</h1>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="breadcumb-menu text-md-end">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li class="active">Collaboration & Association</li>
        </ul>
      </div>
    </div>

  </div>
</div>

<div class="mt-5">
  <div class="container">
    <div class="row flex-row-reverse align-items-center justify-content-between">
      <div class="col-lg-12">
        <div class="about-content-wrap title-anim text-center">
          <div class="title-area mb-0">
            <h2 class="sec-title">Collaboration & Association</h2>
              <p class="sec-text" style="max-width: 1100px;margin: auto;">We believe in collaboration instead of competition. This program is all about fostering growth opportunities in the event industry. Our C8A Community is a platform for ambitious companies to spread their wings, amplify their bandwidth, and skyrocket to success!</p>
              <p class="sec-text" style="max-width: 1100px;margin: auto;margin-top: 10px;">Wedding and Corporate Event Companies. For weddings, we seek those specializing in design, décor, or production. For corporate events, those who excel as conceptualizers and in production, we've got the tools, connections, and strategic guidance to help you thrive. If you're passionate about events and hungry for growth, we want to hear from you!</p>
            <!-- <p class="hero-text title-animation"><a href="https://henna.freevision.me/wedding-planner/vendors/"
                target="_blank" style="margin:10px;background:var(--theme-color);color:var(--white-color);"  class="btn style2">Know
                More</a></p> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mt-5 mb-5">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-8 custom-franchise">
        <div class="reservation-form-wrap">
          <div class="title-area text-center mb-30">
            <h2 class="sec-title">Connect With Us</h2>
          </div>
          <h4 class="form-messages"></h4>
          <form method="POST" class="contact-form form-contact-white" id="collaboration_association_Form">
            <div class="row">
              <input type="hidden" name="enquiry_for" value="Collaboration & Association" />
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
                <label>Company Name*</label>
                <div class="form-group style-4 form-icon-left">
                  <i class="far fa-user"></i>
                  <input type="text" class="form-control style-border" name="companyName" id="companyName"
                    placeholder="Enter Company Name">
                  <div class="error" id="companyNameError"></div>
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
                <label>Social Handles*</label>
                <div class="form-group style-4">
                  <input name="socialHandles" class="form-custom-input custom-tag-input"
                    placeholder="Enter Social Handles" id="socialHandles">
                  <div class="error" id="socialHandlesError"></div>
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