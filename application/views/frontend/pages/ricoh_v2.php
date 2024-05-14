<main class="wrapper" id="content">
	<section class="section bg-light-grey Pt(70px) Pt(100px)--md Ov(h) Mt(15px) Pos(r)">
		<div class="bg-5x8-dot right-top-7 D(b)--md D(n)"></div>
		<div class="Py(100px)--md Py(40px) Maw(1200px) M(a) D(f)--md Ai(c) Jc(sb)">
			<div class="W(100%) W(6/12)--md">
				<div class="Ta(start)--md Ta(c) W(12/12)--sm W(100%)--lg Mx(a) Mx(0)--md Pend(20px)--md Pend(0)">
					<h1
						class="Fz($font-size-28)--md Fz($font-size-24)--sm Fz($font-size-24)--xs Fz($font-size-28)--md Mt(0) Mb(20px) Lh($line-height-default) Fw(600)">
						WeP Solutions Ltd is India’s <br>First authorised distributor of Ricoh Products and Services </h1>
						<p class="Lh(1.5) Mb(25px) Fw(500) Fz($font-size-16)">Together we believe in providing creativity, collaboration & seamless technology to our customers.</p>
					<div class="Mb(30px)">
						<a href="javascript:;" data-bs-toggle="modal" data-bs-whatever="Contact Us" data-bs-target="#contact-us-popup" onclick="dataLayer.push({'event' : 'formSubmitted', 'formName' : 'Contact Us - Ricoh'})" type="button" class="Fz($font-size-16) D(ib)--md Mt(10px) C($color-white):h Mt(0px)--md W(100%) W(a)--xs button">Contact Us</a>
					</div>
				</div>
			</div>
			<div class="W(100%) W(6/12)--md">
				<div class="d-block">
					<div class="dms owl-carousel owl-theme">
						<?php foreach ($ricoh_sliders as $slider):?>
						<div class="item">
							<div class="slider-contain">
								<img src="<?= base_url($slider['image'])?>" class="img-fluid" alt="<?= $slider['image_alt']?>">
								<div class="slider-caption Px(15px) Py(10px) Bg($gradient-grey-top-to-bottom)">
<!--									<div class="slider-title">--><?//= $slider['title'];?><!--</div>-->
									<?php if ($slider['routing_url']){?>
										<a href="<?= $slider['routing_url']?>" onclick="dataLayer.push({'event' : 'formSubmitted', 'formName' : 'Contact Us - Ricoh'})" type="button" class="Fz($font-size-14) D(ib)--md Mt(10px) C($color-white):h Mt(0px)--md W(100%) W(a)--xs button Py(5px)">Read More</a>
									<?php }else{?>
										<a href="javascript:;" data-bs-toggle="modal" data-bs-whatever="<?= $slider['formdropdown']?>" data-bs-target="#contact-us-popup" onclick="dataLayer.push({'event' : 'formSubmitted', 'formName' : 'Contact Us - Ricoh'})" data-id="<?= $slider['formdropdown']?>" type="button" class="Fz($font-size-14) D(ib)--md Mt(10px) C($color-white):h Mt(0px)--md W(100%) W(a)--xs button Py(5px)">Contact Us</a>
									<?php }?>
								</div>
							</div>
						</div>
						<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php if (isset($clientele) && $clientele) { ?>
	<section class="logo-slider">
		<div class="Maw(1200px) Mx(a) Px(20px) Pt(30px) Pb(40px)">
			<h5 class="Mb(20px) Mt(0) Fw($font-weight-medium) Fz($font-size-16) Tt(u) Ta(c)">TRUSTED BY</h5>
			<div class="clients owl-carousel">
				<?php foreach ($clientele as $item) { ?>
					<div class="client-img">
						<img src="<?php echo base_url($item->logo); ?>"
							 alt="<?php echo $item->logo_alt; ?>" class="H(a)"/></div>
				<?php } ?>
			</div>
		</div>
	</section>
	<?php } ?>
	<section class="Bg($color-white) section bg-light-grey">
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(80px)--md Pb(60px)--md">
			<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(15px) Ta(c) Lh($line-height-headings) Fw(600)">Why Ricoh by WeP </h4>
			<p class="Lh(1.5) Mb(25px) Fw(500) Fz($font-size-16) Ta(c)">India’s best Managed Print Service provider is now the India’s First authorised distributor of Ricoh Products and Services. WeP now brings it’s 20+ years of experience in MPS in India, to sell and service Ricoh products that addresses the digital printing market, including office automation, industrial and commercial printing products, through it’s extensive service network. This strategic partnership between Ricoh Asia Pacific and WeP seeks to empower businesses to work smarter and be more productive, contributing to customer's business growth in India.</p>
			<ul class="counter mt-5 row justify-content-center Mb(0)">
				<li class="col-lg-3 col-md-4 col-sm-12 mx-2">
					<div class="count">24000+ </div>
					<div>Printer Install Base</div>
				</li>
				<li class="col-lg-3 col-md-4 col-sm-12 mx-2">
					<div class="count">2000+</div>
					<div>Service Locations</div>
				</li>
				<li class="col-lg-3 col-md-4 col-sm-12 mx-2">
					<div class="count">>95%</div>
					<div>Cumulative Printer Uptime</div>
				</li>
			</ul>
			<!-- <p class="Lh(1.5) Mb(25px) Fw(500) Fz($font-size-16) Ta(c)">With install base of more than 24000 printer and providing service across 2000+ locations, WeP is pioneer in providing Managed Printing Services (MPS) to India. </p> -->
			<!-- <p class="Lh(1.5) Mb(25px) Fw(500) Fz($font-size-16) Ta(c)">Together we believe in providing creativity, Collaboration & seamless technology to our customers. </p> -->
		</div>
	</section>
	<section class="section bg-light-grey">
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(80px)--md Pb(80px)--md">
			<div class="row">
				<div class="col-lg-6 align-self-center">
					<div class="d-block">
						<div class="dms owl-carousel owl-theme">
							<div class="item">
								<img src="<?= base_url("assets/images/ricoh/ricoh-1.jpg")?>" class="img-fluid" alt="Report | document management system software">
							</div>
							<div class="item">
								<img src="<?= base_url("assets/images/ricoh/ricoh-2.jpg")?>" class="img-fluid" alt="Best document management Services | file management software">
							</div>
							<div class="item">
								<img src="<?= base_url("assets/images/ricoh/ricoh-3.jpg")?>" class="img-fluid" alt="Best document management Services | file management software">
							</div>
							<div class="item">
								<img src="<?= base_url("assets/images/ricoh/ricoh-4.jpg")?>" class="img-fluid" alt="Best document management Services | file management software">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 align-self-center">
					<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">With Ricoh Latest Intelligent MFPs improve your productivity and help employees work faster, smarter, and more securely.</h4>
					<ul class="Pstart(20px) C($color-mine-shaft)">
						<li class="Mb(5px)">All new IM series printers which focus on delivering value to customer. </li>
						<li class="Mb(5px)">Numerous connectivity features allowing user to easily install and print. </li>
						<li class="Mb(5px)">10.1” Smart Operation Panel with improved UI provides a better usability and user comfort.</li>
						<li class="Mb(0)">These long life machines are committed to minimise the environmental impact. </li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="section">
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(80px)--md Pb(80px)--md">
			<div class="row">
				<div class="col-lg-6 align-self-center">
					<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">Get the best quality print from your Ricoh printer with Ricoh genuine supplies</h4>
					<ul class="Pstart(20px) C($color-mine-shaft)">
						<li class="Mb(5px)">Ricoh OEM toners are made to extend the life of your printer while lowering overall costs.</li>
						<li class="Mb(5px)">Higher page yields of Ricoh OEM toner help minimise the carbon footprint</li>
						<li class="Mb(5px)">Get Sharp detail and vivid reproduction of image with Ricoh OEM color toner</li>
						<li class="Mb(0)">Ricoh OEM toner complies with ROHS and is designed to meet the high standards to protect human health and the environment.</li>
					</ul>
				</div>
				<div class="col-lg-6 align-self-center">
					<img src="<?= base_url("assets/images/Ricoh-Website-Image/ricoh-web-images-WTS5.png")?>" alt="document workflow automation Software | workflow management system" class="img-fluid">
				</div>
			</div>
		</div>
	</section>
	<section class="section bg-light-grey">
		<div class="bg-5x8-dot right-top-7 D(b)--md D(n)"></div>
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(100px)--md Pb(80px)--md">
			<div class="row">
				<div class="col-lg-6 align-self-center Mb(0)--md Mb(15px)">
					<!--                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Lh($line-height-headings) Ta(c) Mb(0) Fw(600)">Management of Change (MOC)</h4>-->
					<!--                    <p class="Lh(2) text-dark-blue Mb(20px) Fw(500) Ta(c)">Process Flow of MOC</p>-->
					<img src="https://gayatrigramvikas.org/clients/wepdigital/assets/images/Ricoh-Website-Image/ricoh-web-images-WTS6.png" alt="document workflow automation Software | workflow management system" class="img-fluid">
				</div>
				<div class="col-lg-6 align-self-center">
					<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">Still undecided about which printer to purchase?</h4>
					<p class="Lh(1.5) Mb(10px) Fw(500) Fz($font-size-16)">Don't buy a printer that isn't appropriate for your organization.</p>
					<p class="Lh(1.5) Mb(10px) Fw(500) Fz($font-size-16)">If you have any questions in selecting the right printer please contact us we'd be happy to assist!</p>
		
				<div class="Mb(30px)">
						<a href="javascript:;" data-bs-toggle="modal" data-bs-whatever="Contact Us" data-bs-target="#contact-us-popup" onclick="dataLayer.push({'event' : 'formSubmitted', 'formName' : 'Contact Us - Ricoh'})" type="button" class="Fz($font-size-16) D(ib)--md Mt(10px) C($color-white):h Mt(0px)--md W(100%) W(a)--xs button">Contact Us</a>
					</div>
					</div>
			</div>
		</div>
	</section>

	<section class=section3>
		<div class=container>
			<div class="row justify-content-center">
				<h3 class="text-center Mb(25px) Fw(600) text-white Fz($font-size-30)--md Fz($font-size-24)">We deliver great experiences through our phygital approach. Grow faster, start today.</h3>
			</div>
			<div class="text-center">
				<button type="button" data-bs-toggle="modal" data-bs-whatever="Download brochure" data-bs-target="#contact-us-popup" class="btn btn-outline-light w-auto" id=pb>Download brochure </button>
			</div>
		</div>
	</section>
</main>
<div class="modal fade" id="contact-us-popup" tabindex="-1" role="dialog" data-mktoid="1043" aria-labelledby="read-content">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<button type="button"
					class="js-close-modal modal-as-page_D(n) Fxs(0) Cur(p) C($color-dark-grey) Bg(n) Bd(n) P(0) M(0) Pos(a) End(20px)--xs T(20px)--xs T(10px) End(10px)"
					title="Close modal" data-bs-dismiss="modal" aria-label="Close">
				<svg width="20px" height="20px">
					<use xlink:href="#icon-close"></use>
				</svg>
			</button>
			<div class="Jc(sb) Fxw(w) Fxw(nw)--md Fxd(cr) Fxd(r)--md ">
				<div class="D(f) Ai(c) H(100%) Bgc($color-white) Bdrstend(4px) Bdrsbend(4px)">
					<div class="W(100%) Bxz(bb) Px(50px)--md Py(30px)--md P(20px)">
						<form id="read-content-form" method="post" action="<?php echo base_url('form/submitcontactForm');?>" onsubmit="gtag_report_conversion()">
							<input type="hidden" name="request-type">
							<div class="Ta(c) Mb(25px)">
								<h2 class="Fz(24px) Fw($font-weight-medium) Mb(5px) Mt(0) modal-title-1">Contact Us</h2>
							</div>
							<div class="Mb(5px)">
								<label class="Fz(12px) Fw($font-weight-medium) Tt(n)" for="modal-req-demo-v1-fname">
									Name<sup>*</sup> </label>
								<input class="W(100%) input-text" type="text" id="modal-req-demo-v1-fname"
									   name="first_name" data-qa="modal-req-demo-rd-v1-fname" placeholder="Enter Full Name" required/>
								<div class="C($color-red) Fz(11px) Trsp(a) Trsdu(0.15s) Op(0) invalid-input+Op(1) invalid-reason">
									Invalid Name
								</div>
							</div>
							<p class="antispam">Leave this empty: <input type="text" name="url" /></p>
							<p class="antispam">Leave this empty: <input type="email" name="email" /></p>
							<div class="Mb(5px)">
								<label class="Fz(12px) Fw($font-weight-medium) Tt(n)"
									   for="modal-req-demo-v1-email">Email<sup>*</sup> </label>
								<input class="W(100%) input-text" type="email" id="modal-req-demo-v1-email" placeholder="Enter email address" name="user_email"
									   data-qa="modal-req-demo-rd-v1-email" required/>
								<div class="C($color-red) Fz(11px) Trsp(a) Trsdu(0.15s) Op(0) invalid-input+Op(1) invalid-reason">
									Invalid Email
								</div>
							</div>
							<div class="Mb(5px)">
								<label class="Fz(12px) Fw($font-weight-medium) Tt(n)" for="modal-req-demo-v1-pnumber">Phone
									Number<sup>*</sup> </label>
								<input class="W(100%) input-text js-phone" type="tel" id="modal-req-demo-v1-pnumber"
									   name="phone" data-qa="modal-req-demo-rd-v1-pnumber" placeholder="Enter mobile number" required/>
								<div class="C($color-red) Fz(11px) Trsp(a) Trsdu(0.15s) Op(0) invalid-input+Op(1) invalid-reason">
									Invalid Phone Number
								</div>
							</div>
							<div class="Mb(25px)">
								<label class="Fz(12px) Fw($font-weight-medium) Tt(n)" for="City">City</label>
								<input type="text" class="input-text W(100%) city" name="city" placeholder="Enter City Name" aria-autocomplete="none" autocomplete="none" data-id="#city-contact">
								<div class="city-list-container" id="city-contact"></div>
							</div>
							<div class="Mb(5px)">
								<label class="Fz(12px) Fw($font-weight-medium) Tt(n)" for="modal-req-demo-v1-Company-Name">Company Name<sup>*</sup> </label>
								<input class="W(100%) input-text js-phone" type="text" id="modal-req-demo-v1-Company-Name"
									   name="CompanyName" data-qa="modal-req-demo-rd-v1-Company-Name" placeholder="Enter company name" required/>
								<div class="C($color-red) Fz(11px) Trsp(a) Trsdu(0.15s) Op(0) invalid-input+Op(1) invalid-reason">
									Invalid Company Name
								</div>
							</div>
							<?php if ($formdropdown):?>
							<div class="Mb(25px)">
								<label for="help">How can we help you ?</label>
								<div class="Pos(r)">
									<select class="input-text W(100%)" id="help" name="help">
										<option selected>Select a option</option>
										<?php foreach ($formdropdown as $item):?>
										<option value="<?= $item['title']?>"><?= $item['title']?></option>
										<?php endforeach;?>
									</select>
									<div class="Pos(a) T(50%) End(20px) TranslateY(-50%) Pe(n)">
										<svg width="16px" height="16px" class="D(b)" viewBox="0 0 8 5">
											<use xlink:href="#icon-chevron-down"></use>
										</svg>
									</div>
								</div>
							</div>
							<?php endif;?>
							<div class="Mt(10px)">
								<button type="submit" class="button W(100%)" onclick="dataLayer.push({'event' : 'formSubmitted', 'formName' : 'Contact Us - Ricoh'})" name="submitform">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
