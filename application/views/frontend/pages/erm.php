<main class="wrapper" id="content">
    <section class="section bg-light-grey Pt(70px) Pt(100px)--md Ov(h) Mt(15px) Pos(r)">
        <div class="bg-5x8-dot right-top-7 D(b)--md D(n)"></div>
        <div class="Py(100px)--md Py(40px) Maw(1200px) M(a) D(f)--md Ai(c) Jc(sb)">
            <div class="W(100%) W(6/12)--md">
                <div class="Ta(start)--md Ta(c) W(12/12)--sm W(100%)--lg Mx(a) Mx(0)--md Pend(40px)--md">
                    <h1 class="Fz($font-size-28)--md Fz($font-size-24)--sm Fz($font-size-24) Mt(0) Mb(20px) Lh($line-height-default) Fw(700)">Stay agile and productive</h1>
                    <p class="Fz($font-size-18)--md Fz($font-size-16) Pend(20px) Mt(0) Mb(30px)">The primitive way of managing physical employee records has long-term adverse repercussions on data compliance, legal, and audit. With WeP Employee Records Management, keep your electronics personnel files omnipresent while being productive and compliant.</p>
                    <div class="Mb(30px)">
                        <button type="button" data-bs-toggle="modal" data-bs-whatever="Start Free Trial"  data-bs-target="#request-demo" class="Fz($font-size-16) D(ib)--md Mt(10px) Mt(0px)--md Mend(10px) W(100%) W(a)--xs button button--line--rd">Start Free Trial
                        </button>
                        <button type="button" data-bs-toggle="modal" data-bs-whatever="Request Demo"  data-bs-target="#request-demo" class="js-modal Fz($font-size-16) D(ib)--md Mt(10px) Mt(0px)--md W(100%) W(a)--xs button">Request
                            Demo
                        </button>
                    </div>
                </div>
            </div>
            <div class="W(100%) W(6/12)--md">
                <picture><img
                        src="<?php echo base_url('assets/images/erm/erm-banner.png'); ?>"
                        srcset="<?php echo base_url('assets/images/erm/erm-banner.png'); ?>"
                        alt="Top employee record management system" class="img-fluid"/>
                </picture>
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
    <section class="section Bg($color-white)">
        <div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
            <div class="row">
				<div class="col-lg-6 align-self-center Mb(0)--md Mb(15px)">
					<img src="<?php echo base_url('assets/images/erm/4.png');?>" alt="Best employee record management software" class="img-fluid">
				</div>
                <div class="col-lg-6">
                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(15px) Lh($line-height-headings) Fw(600)">Access and retention of records made easy </h4>
                    <p class="Lh(1.5) Mb(10px) Fw(500) Fz($font-size-16) text-justify">Access and retention are the basic building blocks of good records management. WeP Employee Records Management keeps your Employee Personnel records in a centralized location that is accessible anywhere.</p>
                    <ul class="Pstart(20px) C($color-mine-shaft)">
                        <li class="Mb(5px)">Fast & secure retrieval of records</li>
                        <li class="Mb(5px)">Centralized data storage</li>
                        <li class="Mb(5px)">Advanced search capability with Metadata </li>
                        <li class="Mb(5px)">Seamless collaboration with employees</li>
                        <li class="Mb(5px)">Seamless collaboration with partners</li>
                        <li class="Mb(0)">Easy integration with third-party application</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section bg-light-grey">
        <div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(15px) Lh($line-height-headings) Fw(600)">Manage employee records in a secured and compliant way</h4>
                    <p class="Lh(1.5) Mb(10px) Fw(500) Fz($font-size-16) text-justify">We understand that you take confidential employee data seriously and that is why we created a State-of-the-art application that has enterprise-level security with the following benefits:</p>
                    <ul class="Pstart(20px) C($color-mine-shaft)">
                        <li class="Mb(5px)">Intuitive workspace and folder structure</li>
                        <li class="Mb(5px)">Real-time file preview </li>
                        <li class="Mb(5px)">E-Lockers feature to password protect your Employee records </li>
                        <li class="Mb(5px)">Share data securely with auditors, authorities, and partners</li>
                        <li class="Mb(5px)">AES 256-Bit (Advanced Encryption Standard)</li>
                        <li class="Mb(0)">An audit trail that helps you reconstruct the events in case of discrepancy with data compliance </li>
                    </ul>
                </div>
				<div class="col-lg-6 align-self-center">
					<img src="<?php echo base_url('assets/images/erm/banner--2-7.png');?>" alt="hr file management software | employee record management software" class="img-fluid">
				</div>
            </div>
        </div>
    </section>
    <section class="section Bg($color-white)">
<!--        <div class="bg-5x8-dot right-top-7"></div>-->
        <div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
            <div class="row">
				<div class="col-lg-6 Mb(0)--md Mb(15px)">
					<div class="d-block">
						<img src="<?php echo base_url('assets/images/erm/banner-v.2-08.png');?>" alt="Top employee record management system | hr document management software" class="img-fluid">
						<!--                        <div class="dms owl-carousel owl-theme">-->
						<!--                            <div class="item">-->
						<!--                                <img src="assets/images/employee-records-management/collecting.png" class="img-fluid" alt="">-->
						<!--                            </div>-->
						<!--                            <div class="item">-->
						<!--                                <img src="assets/images/employee-records-management/tracking.png" class="img-fluid" alt="">-->
						<!--                            </div>-->
						<!--                            <div class="item">-->
						<!--                                <img src="assets/images/employee-records-management/following-up.png" class="img-fluid" alt="">-->
						<!--                            </div>-->
						<!--                        </div>-->
					</div>
				</div>
                <div class="col-lg-6 align-self-center">
                    <div class="Maw(900px)">
                        <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(15px) Lh($line-height-headings) Fw(600)">Collecting, tracking, and following-up of employee documents</h4>
                        <p class="Lh(1.5) Mb(10px) Fw(500) Fz($font-size-16)">One of the typical challenges that our customers faced before adapting our Employee Record Management application is tracking and collecting physical employee documents at the time of hiring. </p>
                        <ul class="Pstart(20px) C($color-mine-shaft)">
                            <li class="Mb(5px)">Dashboard report on the exact count of documents</li>
                            <li class="Mb(5px)">Auto-notifications on missing document to keep track of employee records documents</li>
                            <li class="Mb(0)">Easy to manage organization communication and campaigns </li>
                        </ul>
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
<!--                <button type="button" class="btn btn-outline-light" data-bs-whatever="Free Trial" data-bs-toggle="modal" data-bs-target="#request-demo" id=pb>Free Trial</button>-->
<!--                <button type="button" class="btn btn-light" data-bs-whatever="Request Demo" data-bs-toggle="modal" data-bs-target="#request-demo" id=pb>Request Demo</button>-->
				<a download href="<?= base_url('assets/doc/WeP-ERM-Pamphlet.pdf')?>" type="button" class="btn btn-outline-light w-auto" id="pb">Download brochure</a>
            </div>
        </div>
    </section>
</main>
