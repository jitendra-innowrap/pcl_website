<main class="wrapper" id="content">
    <section class="Bgc($color-white) Pt(70px) Pt(100px)--md Ov(h)">
        <div class="Py(70px)--md Py(40px) Maw(1200px) M(a) D(f)--md Ai(c) Px(20px) Jc(sb)">
            <div class="W(100%) W(6/12)--md">
                <div class="Ta(start)--md Ta(c) W(11/12)--md W(12/12)--xs W(100%)--lg Mx(a) Mx(0)--md">
                    <h4 class="Fz($font-size-40)--md Fz($font-size-30)--sm Fz($font-size-24) Lts(1px)--md Mt(0) Mb(20px) Lh($line-height-headings)">
                        Partner in transforming
                        enterprises into intelligence
                        workplaces</h4>
                    <p class="Fz($font-size-18)-md Fz($font-size-16) Pend(10px) Mt(0) Mb(50px)--md Mb(30px)">WeP brings you 20+ years of experience in
                        helping
                        Enterprises transform their business challenges into
                        Business Solutions through <font class="phygital">phygital</font> approach</p>
                    <div class="My(30px) Mt(0px)--xs">
                        <button type="button" data-bs-toggle="modal" data-bs-whatever="Request Demo"
                                data-bs-target="#request-demo"
                                class="js-modal D(ib)--md Mt(10px) Mt(0px)--md W(100%) W(a)--xs button">Request
                            Demo
                        </button>
                    </div>
					<div class="W(a)--sm W(5/12)--md W(12/12)--xs P(20px) P(0)--sm Bxz(bb)">
						<img src="assets/images/home/iso-sm.jpg"
							 alt="Best e invoice ,e way bill and gst filing services | WeP Digital" class="H(a) Op(1) iso-logo"></div>
                </div>
            </div>
			<div class="d-none">
				<h1>WeP GST e-Invoice Software Portal Guide</h1>
				<h2>Document Management System</h2>
				<h2>Workflow Automation</h2>
				<h2>E-Way bill and e-Invoice solution</h2>
				<h2>Employee Records Management System</h2>
				<h2>Manage GST Filing services</h2>
				<h2>Low Code Development Platform</h2>
				<h3>Workflow Automation</h3>
				<h3>Management of Change</h3>
				<h3>Procure to Pay automation</h3>
				<h3>Goods and Service tax solution</h3>
				<h3>WeP Managed Print Services</h3>
			</div>
            <div class="W(100%) W(6/12)--md">
                <div class="D(f) Jc(c)--sm Jc(fs)--xs Pos(r) H(100%)">
					<div class="home_banner owl-carousel owl-theme">
						<?php foreach ($home_banners as $home_banner){?>
							<div class="W(100%) Ta(c) position-relative">
									<a href="<?php echo ($home_banner->routing_url != ''? $home_banner->routing_url:'javascript:;')?>">
										<picture><img
													src="<?php echo base_url($home_banner->image); ?>"
													srcset="<?php echo base_url($home_banner->image); ?>"
													alt="<?= $home_banner->image_alt?>" class="Flxs(0) H(550px)--sm H(a)--md H(550px)--lg H(a)"/>
										</picture>
									</a>
							</div>
						<?php }?>
					</div>
                </div>
            </div>
        </div>
    </section>
	<?php if ($clientele){?>
    <section class="logo-slider Bdtw(1px) Bdts(s) Bdbc($color-grey-border-1) Bdtc($color-grey-border-1)">
        <div class="Maw(1200px) Mx(a) Px(20px) Pt(30px) Pb(40px)">
            <h5 class="Mb(20px) Mt(0) Fw($font-weight-medium) Fz($font-size-16) Tt(u) Ta(c)">TRUSTED BY</h5>
            <div class="clients-home owl-carousel" data-loop="true">
				<?php foreach ($clientele as $clients){?>
                <div class="client-img">
                    <img src="<?php echo base_url($clients->logo); ?>"
                         alt="<?php echo $clients->logo_alt;?>" class="H(a)"/></div>
				<?php }?>
            </div>
        </div>
    </section>
	<?php }?>
    <section class="Bgc(#f8f9fd)">
        <div class="Py(50px)--md Py(40px) Ov(h) Px(0)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
            <div class="Mb(70px)--md Mb(40px)">
                <h4 class="M(0) Ta(c) Fz($font-size-34)--md Fz($font-size-30)--sm Fz($font-size-24) Fw($font-weight-regular) Lh($line-height-headings)">
                    Empower Users with WeP <font class="phygital">Phygital</font> solutions</h4>

            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-3 Px(8px)">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-lg-3 employee-records-management-nav" id="v-pills-tab"
                             role="tablist"
                             aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home"
                               role="tab" aria-controls="v-pills-home" aria-selected="true">SaaS</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile"
                               role="tab" aria-controls="v-pills-profile" aria-selected="false">Services</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages"
                               role="tab" aria-controls="v-pills-messages" aria-selected="false">PaaS</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings"
                               role="tab" aria-controls="v-pills-settings" aria-selected="false">Ricoh</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-9 Px(8px) Bxz(bb)">
                    <div class="d-flex align-items-start">
                        <div class="tab-content employee-records-management me-lg-4" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                 aria-labelledby="v-pills-home-tab">
                                <!--								<h6 class="tab-title">Employee Records Management System Centralise<br>-->
                                <!--									your employee records storage for secured access</h6>-->
                                <ul>
                                    <li><img src="<?php echo base_url('assets/images/icon/erm-lg.svg'); ?>"
                                             class="icon" alt="Top Employee Record Management system|employee file management system"/>
                                        <h6><a href="<?php echo base_url('employee-records-management-system');?>">Employee Records Management System</a> </h6>
                                        <p>Physical Storage of documents leads to potential data breach and compliance
                                            issue</p>
                                    </li>
                                    <li><img src="<?php echo base_url('assets/images/icon/Group 28.png'); ?>"
                                             class="icon" alt="Best Management of change software | document management software"/>
										<h6><a href="<?php echo base_url('management-of-change-process');?>">Management of Change</a></h6>
                                        <p>Control environmental, health and safety risks and increase efficiency</p>
                                    </li>

                                    <li><img src="<?php echo base_url('assets/images/icon/3208914.png'); ?>"
                                             class="icon" alt="Best procure to pay software|p2p process in India| payment processing software"/>
										<h6><a href="<?php echo base_url('procurement-to-pay');?>">Procure to Pay automation</a></h6>
                                        <p>Our customer reduced P2P approval cycle from 30 days to 7 days</p>
                                    </li>

                                    <li><img src="<?php echo base_url('assets/images/icon/dms-lg.svg'); ?>"
                                             class="icon" alt="Best document management Services | file management software"/>
										<h6><a href="<?php echo base_url('document-management-services');?>">Document Management System</a></h6>
                                        <p>Securely store, track and manage your business documents</p>
                                    </li>

                                    <li><img src="<?php echo base_url('assets/images/icon/2099058.png'); ?>"
                                             class="icon" alt="Best workflow automation Software|business process management software"/>
										<h6><a href="<?php echo base_url('workflow-automation-software');?>">Workflow Automation</a></h6>
                                        <p>Visual workflows to Automate your business process</p>
                                    </li>

                                    <li><img src="<?php echo base_url('assets/images/icon/3408773.png'); ?>"
                                             class="icon" alt="Best GST Platform for GST Return Filing|GST Reconciliations|MIS reports"/>
										<h6><a href="<?php echo base_url('best-gst-platform-for-return-filing');?>">Goods and Service tax solution</a></h6>
                                        <p>All your GST filing and Reconciliation simplified and secure</p>
                                    </li>
                                    <li><img src="<?php echo base_url('assets/images/icon/711894.png'); ?>"
                                             class="icon" alt="Best gst e-way Bill System|e-Invoicing Software|Digital Invoicing System"/>
										<h6><a href="<?php echo base_url('einvoice-software');?>">E-Way bill and e-Invoice solution</a></h6>
                                        <p>Find out 3 ways to generate e-Invoice and e-Way bill</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                 aria-labelledby="v-pills-profile-tab">
                                <ul>
                                    <li><img src="<?php echo base_url('assets/images/icon/3208914.png'); ?>"
                                             class="icon" alt="Best Managed Print Services|Asset Management System|Cloud Printing Solutions"/>
										<h6><a href="<?php echo base_url('managed-print-services');?>">WeP Managed Print Services</a></h6>
                                        <p>Find out, how to reduce 35% of your printing cost</p>
										<p class="text-justify">WeP will Manage your Printing Service
											securely giving you time to focus on growing your business. Never get bothered by the CAPEX of
											the printer, Interest you lose on the CAPEX, 10%-15% Cost on spare parts, Cost on Toner, or
											document security.</p>
                                    </li>
                                    <li><img src="<?php echo base_url('assets/images/icon/3408773.png'); ?>"
                                             class="icon" alt="Best monthly GST returns | GST Reports | Input tax credit"/>
										<h6><a href="<?php echo base_url('monthly-gst-returns-gst-reports');?>">Manage GST Filing services</a></h6>
                                        <p>File your GST returns along with compliance management</p>
										<p class="text-justify">Provide GST compliant data to our return filing professionals and they manage the entire filing process with their expertise knowledge till submission of the return. Entire process is driven through the utility of Wep ASP software, loaded with varied user-friendly features.</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                 aria-labelledby="v-pills-messages-tab">
                                <ul>
                                    <li class="mb-0"><img src="<?php echo base_url('assets/images/icon/711894.png'); ?>"
                                                          class="icon" alt="Best low code app development | best low code platform"/>
										<h6><a href="<?php echo base_url('low-code-development');?>">Low Code Development Platform</a></h6>
                                        <p class="mb-2">Develop and deploy your application 50% faster</p>
										<p>Build custom applications that align with your brand and business goals.</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                 aria-labelledby="v-pills-settings-tab">
                                <h6 class="tab-title mt-4 text-center">Empower your business by automating your printing
                                    processes</h6>
                                <img src="<?php echo base_url('assets/images/home/wep-ricoh.png'); ?>" alt="Top ricoh pinter dealers & ricoh distributors in India| ricoh authorized dealers"
                                     class="img-fluid Maw(202px) d-block mx-auto mb-4">
                                <button id="js-header-free-trial-btn"
                                        onclick="window.open('https://www.wepmyshop.com/ricoh-products-solutions')"
                                        target="_blank" type="button"
                                        class="button button--small D(n) D(ib)--md gtm-header-request-demo gtm-top-menu-request-demo-cta js-top-menu-request-demo-cta M(0) d-block mx-auto"
                                        data-modal="modal-free-trial">BUY RICOH Products/Consummables
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gradiant-purple position-relative overlay-grid">
        <!--		<div class="overlay-grid"></div>-->
        <div class="Py(50px)--md Py(40px) Ov(h) Px(0)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
            <div class="Mb(30px)--md Mb(40px)">
                <h4 class="M(0) text-white Ta(c) Fz($font-size-34)--md Fz($font-size-30)--sm Fz($font-size-24) Fw(600) Lh($line-height-headings)">
                    Our Achievements</h4>
            </div>
            <ul class="achievements-container row justify-content-center">
                <li class="col-md-3">
                    <div class="achiev-box">
                        <div class="achiev-icon">
                            <img src="<?php echo base_url('assets/images/icon/Enterprise-Customers.png'); ?>" alt="">
                        </div>
                        <h4>600 <span>+</span></h4>
                        <p>Enterprise Customers</p>
                    </div>
                </li>
                <li class="col-md-4">
                    <div class="achiev-box blr-after-border">
                        <div class="achiev-icon">
                            <img src="<?php echo base_url('assets/images/icon/Retail-customer.png'); ?>" alt="">
                        </div>
                        <h4>200000 <span>+</span></h4>
                        <p>Retail Customers</p>
                    </div>
                </li>
                <li class="col-md-3">
                    <div class="achiev-box">
                        <div class="achiev-icon">
                            <img src="<?php echo base_url('assets/images/icon/active-partners.png'); ?>" alt="">
                        </div>
                        <h4>184</h4>
                        <p>Active Partners</p>
                    </div>
                </li>
            </ul>

        </div>
    </section>
    <?php if ($banner_list) { ?>
        <section class="position-relative">
            <div class="Py(50px)--md Py(40px) Ov(h) Px(0)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
                <div class="slider-container">
                    <div class="site-slider owl-carousel owl-theme">
                        <?php foreach ($banner_list as $banner) { ?>
                            <div class="<?php echo($banner->is_video == 1 ? 'item-video' : '') ?>">
                                <?php if ($banner->is_video == 1) { ?>
                                    <a class="owl-video" href="<?php echo $banner->video_url?>"></a>
                                <?php } else { ?>
                                    <div class="slider-img"><img src="<?php echo $banner->image; ?>" alt="Sldie 1"/></div>
                                    <div class="slider-text">
                                        <h3><?php echo $banner->title; ?></h3>
                                        <p><?php echo $banner->description; ?></p>
                                        <?php if ($banner->is_button) { ?>
                                            <a href="<?php echo $banner->routing_url?>" class="button button--small">Know more</a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</main>
<script id='pixel-script-poptin' src='https://cdn.popt.in/pixel.js?id=0660f170ded26' async='true'></script>
