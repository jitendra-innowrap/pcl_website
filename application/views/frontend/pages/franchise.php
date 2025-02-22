<!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper bg-gradient">
  <!-- bg animated image/ -->
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-md-8">
        <div class="breadcumb-content">
          <h1 class="breadcumb-title">Franchise</h1>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="breadcumb-menu text-md-end">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li class="active">Franchise</li>
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
            <h2 class="sec-title">Franchise</h2>
              <p class="sec-text" style="max-width: 1000px;margin: auto;"> DISCOVER THE UNTAPPED POTENTIAL OF THIS BUSINESS MODEL WITH PARTY CRUISERS LTD</p>
              <p class="sec-text" style="max-width: 1200px;margin: auto;margin-top: 10px;">HOW WILL FRANCHISING BENEFIT YOU?</p>
              <p class="sec-text" style="max-width: 1200px;margin: auto;margin-top: 10px;"><b>PROVEN SUCCESS:</b> FRANCHISES OFFER A TRACK RECORD OF SUCCESS, REDUCING THE RISK OF FAILURE.</p>
              <p class="sec-text" style="max-width: 1000px;margin: auto;margin-top: 10px;"><b>BRAND RECOGNITION:</b> TAP INTO AN ESTABLISHED BRAND AND CUSTOMER BASE.</p>
              <p class="sec-text" style="max-width: 1200px;margin: auto;margin-top: 10px;"><b>SUPPORT & TRAINING:</b> ACCESS TO TRAINING, MARKETING, AND ONGOING SUPPORT FROM EXPERIENCED PROFESSIONALS. </p>
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
          <form method="POST" class="contact-form form-contact-white" id="franchiseForm">
            <div class="row">
              <input type="hidden" name="enquiry_for" value="Franchise" />
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
                <label>Occupation*</label>
                <div class="style-4" style="margin-bottom: 20px;">
                  <select name="occupation" id="occupation" class="form-control style-border">
                    <option value="">Select Occupation</option>
                    <option value="Business">Business</option>
                    <option value="Job">Job</option>
                  </select>
                  <div class="error" id="occupationError"></div>
                </div>
              </div>
              <div class="col-lg-6">
                <label>Franchise type*</label>
                <div class="style-4">
                  <select name="franchiseType" id="franchiseType" class="form-control style-border">
                    <option value="">Select Franchise Type</option>
                    <option value="Unit (City)">Unit (City)</option>
                    <option value=" Master (State)"> Master (State)</option>
                  </select>
                  <div class="error" id="franchiseTypeError"></div>
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


<div class="pt-4 pb-4 position-relative">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-sm-5 mb-3">
        <h2 style="max-width: 200px;margin: inherit;margin-bottom: 0px;" class="sec-title">Our</h2>
        <h2 style="margin: inherit;" class="sec-title">Current Offices</h2>
      </div>
      <div class="col-sm-5 mb-3">
        <div class="title-anim">
          <h6 style="margin-bottom: 0px;">Mumbai (Head Office)</h6>
          <p>Delhi | Chandigarh | Hyderabad | Bengaluru | Mysore | Indore | Nashik | Nanded</p>
        </div>
      </div>
    </div>
  </div>
</div>