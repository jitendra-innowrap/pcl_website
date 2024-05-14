<main class="wrapper" id="content">
	<section class="Bgc($color-white) Pt(70px) Pt(120px)--md Ov(h)">
		<div class="Py(50px)--md Py(40px) Ov(h) Px(0)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
			<div class="row justify-content-center">
				<div class="col-md-6 Mb(0)--md Mb(30px)">
					<div class=inner>
						<h2 class="Fw(600) Fz($font-size-34)--md Fz($font-size-20)--xs">Contact our sales team</h2>
						<p class="Fz($font-size-20) mb-3">We will be happy to answer your sales questions.<br>
							Fill out the form and we will get back to you shortly.
						</p>
						<?php if($this->session->flashdata('contact')) {
							$message = $this->session->flashdata('contact');?>
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
								<?php echo $message;?>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						<?php }?>
						<div class="form-inner">
							<form class="form-container" method="post" enctype="multipart/form-data" onsubmit="gtag_report_conversion()">
								<div class="row">
									<div class="col-md-12 mb-3">
										<label for="Name">Name*</label>
										<input type="text" name="full_name" class="input-text W(100%)" id="Name"
											   placeholder="Enter Full Name" required>
									</div>
									<div class="col-md-6 mb-3">
										<label for="Email">Email*</label>
										<input type="email" name="user_email" class="input-text W(100%)" id="Email"
											   placeholder="Enter Email" required>
									</div>
									<div class="col-md-6 mb-3">
										<label for="exampleFormControlInput1">Mobile*</label>
										<input type="tel" name="user_phone" class="input-text W(100%)" id="exampleFormControlInput1"
											   placeholder="Enter Mobile Number" required>
									</div>
									<div class="col-md-6 mb-3">
										<label for="Designation">Department</label>
										<input type="text" name="designation" class="input-text W(100%)" id="Designation"
											   placeholder="Enter Department">
									</div>
									<div class="col-md-6 mb-3">
										<label for="CompanyName">Company Name*</label>
										<input type="text" name="companyname" class="input-text W(100%)" id="CompanyName"
											   placeholder="Enter Company Name" required>
									</div>
									<div class="col-md-6 mb-3">
										<label for="City">City*</label>
										<input type="text" class="input-text W(100%) city" id="City"
											   placeholder="Enter City Name" aria-autocomplete="none"
											   autocomplete="none" name="user_city" data-id="#city-records" required>
										<div class="city-list-container" id="city-records"></div>
									</div>
									<div class="col-md-6 mb-3">
										<label for="State">How can we help you?*</label>
										<div class="Pos(r)">
											<select class="input-text W(100%)" name="user_request" id="helpyou" required>
												<option disabled>Select a Product/Service</option>
												<option>Trial</option>
												<option selected>Demo</option>
												<option>Enquiry</option>
											</select>
											<div class="Pos(a) T(50%) End(20px) TranslateY(-50%) Pe(n)">
												<svg width="16px" height="16px" class="D(b)" viewBox="0 0 8 5">
													<use xlink:href="#icon-chevron-down"></use>
												</svg>
											</div>
										</div>
									</div>
									<div class="col-md-12 mb-3">
										<label for="Product">Product/Service Needed*</label>
										<div class="Pos(r)">
											<select class="input-text W(100%)" name="product" id="Product" required>
												<option value="SaaS">SaaS</option>
												<option value="Managed Print Services">Managed Print Services</option>
												<option value="Managed GST Services">Managed GST Services</option>
												<option value="Low Code Development Platform (PaaS)">Low Code
													Development Platform (PaaS)
												</option>
												<option value="Ricoh Products / Consumables ">Ricoh Products /
													Consumables
												</option>
											</select>
											<div class="Pos(a) T(50%) End(20px) TranslateY(-50%) Pe(n)">
												<svg width="16px" height="16px" class="D(b)" viewBox="0 0 8 5">
													<use xlink:href="#icon-chevron-down"></use>
												</svg>
											</div>
										</div>
									</div>
									<div class="col-md-12 mb-3">
										<label for="aboutus">How did you know about us?*</label>
										<div class="Pos(r)">
											<select class="input-text W(100%)" name="know_about" id="aboutus" required>
												<option selected>Select a option</option>
												<option value="Google Ads">Google Ads</option>
												<option value="LinkedIn">LinkedIn</option>
												<option value="Facebook">Facebook</option>
												<option value="Webinar">Webinar</option>
												<option value="Email">Email</option>
												<option value="Reference">Reference</option>
											</select>
											<div class="Pos(a) T(50%) End(20px) TranslateY(-50%) Pe(n)">
												<svg width="16px" height="16px" class="D(b)" viewBox="0 0 8 5">
													<use xlink:href="#icon-chevron-down"></use>
												</svg>
											</div>
										</div>
									</div>
									<div class="col-md-12 mb-3">
										<label for="exampleFormControlTextarea1">Message</label>
										<textarea class="input-text W(100%)" name="message" id="exampleFormControlTextarea1" rows="5"
												  placeholder="Message"></textarea>
									</div>
									<div class="col-md-12 text-end">
										<button type="submit" id=redbutton class="button Fw(400) Py(8px)">Contact Now
										</button>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<?php if ($webinars) {
						foreach ($webinars as $webinar) { ?>
							<div class="webinar-card">
								<div class="webinar-card-body position-relative">
									<div class="webinar-content">
										<h4 class="web-title"><?php echo $webinar['title']; ?></h4>
										<h6 class="Fw(500) Fz($font-size-16) text-theme-color"><i
													class="ti-calendar"></i> <?php echo date('d M, Y', strtotime($webinar['date'])); ?>
											|
											<i class="ti-time"></i> <?php echo date('h:i', strtotime($webinar['from_time'])); ?>
											- <?php echo date('h:i a', strtotime($webinar['to_time'])); ?></h6>
										<?php
										echo '<p class="web-desc mb-4 text-justify">' . substr(ltrim(strip_tags($webinar['description'])), 0, 500) . "...</p>";
										if ($webinar['speakers']) { ?>
											<ul class="webinar-member">
												<?php foreach ($webinar['speakers'] as $speaker) { ?>
													<li>
														<div class="media">
															<img src="<?php echo base_url($speaker['photo']); ?>"
																 alt=""/>
														</div>
														<div class="list-content">
															<h4><?php echo $speaker['name']; ?></h4>
															<p><?php echo $speaker['designation']; ?>
																, <?php echo $speaker['company']; ?></p>
														</div>
													</li>
												<?php } ?>
											</ul>
										<?php } ?>
									</div>
									<div class="webinar-footer">
										<?php
										$cureent_date = date('d-m-Y');
										if (strtotime($cureent_date) < strtotime($webinar['date'])) {
											?>
											<a target="_blank" href="<?php echo $webinar['video_url']; ?>"
											   class="btn-webinar">Register Now</a>
										<?php } else {
											?>
											<a href="<?php echo base_url('webinars/' . $webinar['slug']); ?>"
											   class="btn-webinar">Watch
												Webinar</a>
										<?php } ?>
									</div>
								</div>
							</div>
						<?php }
					} ?>

					<div class="st-card">
						<div class="Mb(20px)">
							<div class="D(f) Ai(c) Mb(0)--md Mb(15px)">
								<span class="Fw($font-weight-medium) text-theme-color Fz(16px)"><i
											class="bi bi-geo-alt-fill"></i> Corporate Headquarters</span>
							</div>
							<p class="Fz($font-size-14) C($color-dark-grey) Td(n)">WeP Solutions Limited,<br>
								40/1A, Basappa Complex, Lavelle Road,<br>
								Bengaluru, Karnataka – 560001</p>
						</div>
						<div class="Mb(20px)">
							<div class="D(f) Ai(c) Mb(0)--md Mb(15px)">
								<span class="Fw($font-weight-medium) text-theme-color Fz(16px)">Sales Info & Enquiries</span>
							</div>
							<a class="Fz($font-size-14) C($color-dark-grey) Td(n) Td(u):h" href="tel:1800-102-6010"><i
										class="bi bi-phone-fill"></i> 1800-102-6010</a>
							<a class="Fz($font-size-14) C($color-dark-grey) Td(n) Td(u):h Mstart(5px)"
							   href="mailto:info@wepdigital.com"><i class="bi bi-envelope-fill"></i> info@wepdigital.com</a>
						</div>
						<div class="Mb(20px)">
							<div class="D(f) Ai(c) Mb(0)--md Mb(15px)">
								<span class="Fw($font-weight-medium) text-theme-color Fz(16px)">General Contact</span>
							</div>
							<a class="Fz($font-size-14) C($color-dark-grey) Td(n) Td(u):h" href="tel:1800-102-6010"><i
										class="bi bi-phone-fill"></i> 1800-102-6010</a>
							<a class="Fz($font-size-14) C($color-dark-grey) Td(n) Td(u):h Mstart(5px)"
							   href="mailto:info@wepdigital.com"><i class="bi bi-envelope-fill"></i> info@wepdigital.com</a>
						</div>
						<div class="Mb(40px)">
							<div class="D(f) Ai(c) Mb(0)--md Mb(15px)">
								<span class="Fw($font-weight-medium) text-theme-color Fz(16px)">Support</span>
							</div>
							<a class="Fz($font-size-14) C($color-dark-grey) Td(n) Td(u):h" href="tel:1800-102-6010"><i
										class="bi bi-phone-fill"></i> 1800-102-6010</a>
							<a class="Fz($font-size-14) C($color-dark-grey) Td(n) Td(u):h Mstart(5px)"
							   href="mailto:info@wepdigital.com"><i class="bi bi-envelope-fill"></i> info@wepdigital.com</a>
						</div>
						<div>
							<div class="D(f) Ai(c)">
								<div class="Mt(30px) Mt(0)--lg">
									<a href="https://www.linkedin.com/company/wep-digital/" aria-label="Linkedin"
									   target="_blank" class="Mend(20px) D(ib) C(#a3a5aa) C($color-black):h"
									   rel="nofollow noopener">
										<svg width="24" height="24">
											<use xlink:href="#icon-linkedin-type2"></use>
										</svg>
									</a>
									<a href="https://twitter.com/wepdigital" target="_blank" aria-label="Twitter"
									   class="Mend(20px) D(ib) C(#a3a5aa) C($color-black):h" rel="nofollow noopener">
										<svg width="24" height="24">
											<use xlink:href="#icon-twitter-type2"></use>
										</svg>
									</a>
									<a href="https://www.facebook.com/wepdigital" target="_blank" aria-label="Facebook"
									   class="Mend(10px) D(ib) C(#a3a5aa) C($color-black):h" rel="nofollow noopener">
										<svg width="24" height="24">
											<use xlink:href="#icon-facebook-type2"></use>
										</svg>
									</a>
									<a href="https://www.youtube.com/channel/UCKUQeVYGhrUDXfWVTHg3RDg"
									   aria-label="Youtube" target="_blank" class="D(ib) C(#a3a5aa) C($color-black):h"
									   rel="nofollow noopener">
										<svg width="24" height="24">
											<use xlink:href="#icon-youtube"></use>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<section class="position-relative">
		<!--		<div class="overlay-grid"></div>-->
		<div class="Py(50px)--md Py(10px) Ov(h) Px(0)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
			<iframe width="100%" height="450px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.9592703703292!2d77.59718801536505!3d12.974456918324675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae167a32fbfb77%3A0x2386b9d61739048a!2sWeP%20Solutions%20Limited!5e0!3m2!1sen!2sin!4v1612441155819!5m2!1sen!2sin"
					aria-label="wep digital services "></iframe>
		</div>
	</section>
</main>
