<div class="contact-area-1 space overflow-hidden" data-bg-src="<?php echo base_url();?>assets/images/form-bg.jpg">
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
          <form action="<?php echo base_url("console/add_contact"); ?>" method="POST"
            class="contact-form form-contact-black" id="contactForm">
            <div class="row">
            <input type="hidden" name="enquiry_for" value="Party Cruisers Limited" />
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
                <div class="d-flex form-group form-icon-left">
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
                <label>Location of Event*</label>
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
                <label>No. of Guests*</label>
                <div class="form-group form-icon-left">
                  <i class="fas fa-users"></i>
                  <input type="number" class="form-control style-border" name="number" id="number"
                    placeholder="Number of Guests" min="0" max="100000">
                  <div class="error" id="numberError"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <label>Event*</label>
                <div class="form-group form-icon-left">
                  <select name="event" id="event" class="form-control style-border">
                    <option value="">Select Event</option>
                    <option value="wedding">Wedding</option>
                    <option value="engagement">Engagement</option>
                    <option value="anniversary">Anniversary</option>
                    <option value="birthday">Birthday</option>
                    <option value="other">Other</option>
                  </select>
                  <div class="error" id="eventError"></div>
                </div>
              </div>
              <div class="col-lg-4" id="subEventContainer" style="display:none;">
                <label>Sub Event*</label>
                <div class="form-group form-icon-left">
                  <select name="subEvent" id="subEvent" class="form-control style-border">
                    <!-- Options will be dynamically added here -->
                  </select>
                  <div class="error" id="subEventError"></div>
                </div>
              </div>
              <div class="col-lg-4" id="otherEventContainer" style="display:none;">
                <label>Other Event*</label>
                <div class="">
                  <input type="text" class="form-control style-border"  maxlength="100" name="otherEvent" id="otherEvent"
                    placeholder="Specify Other Event">
                  <div class="error" id="otherEventError"></div>
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