<main class="wrapper" id="content">
	<section class="section bg-white Pt(70px) Pt(100px)--md Ov(h) Mt(15px) Pos(r)">
		<div class="bg-5x8-dot right-top-7 D(b)--md D(n)"></div>
		<div class="Py(100px)--md Py(40px) Maw(1200px) M(a) D(f)--md Ai(c) Jc(sb)">
			<div class="W(100%) W(7/12)--md">
				<div class="Ta(start)--md Ta(c) W(12/12)--sm W(100%)--lg Mx(a) Mx(0)--md">
					<p class="Fz($font-size-24)--md Fz($font-size-16) Pend(20px)--md Pend(0) Mt(0) Mb(30px) Fw($font-weight-medium)">
						Experience the Fastest <span class="gst">GST Filing Software</span> with <br><span class="gst">6000</span>
						Invoices Matching at Once<br></p>
					<p class="Fz($font-size-17)--md Fz($font-size-16) Pend(20px)--md Pend(0) Mt(0) Mb(30px)"> WeP has 20 Years of Experienced in Digital Transformation Solutions.We
						are <br> the Licensed GST Suvidha Provider(GSP).</p>
					<div class="Fz($font-size-16)--md Fz($font-size-16) Pend(20px)--md Pend(0) Mt(0) Mb(30px) row justify-content-lg-between justify-content-center"><div class="col-auto">Claim <span class="tax Fw($font-weight-medium)">100%</span> Input Tax
							Credit </div> <div class="col-auto"><span class="tax Fw($font-weight-medium)">256 Bit </span>
							Security (Best in Industry)</div></div>
					<div class="Fz($font-size-16)--md Fz($font-size-16) Pend(20px)--md Pend(0) Mt(0) Mb(30px) row justify-content-lg-between justify-content-center"><div class="col-auto">Support & <span
									class="tax Fw($font-weight-medium)"> 99.99%</span> Uptime Recorded</div> <div class="col-auto"><span>Connect with <span class="tax Fw($font-weight-medium)">any ERP</span> with Ease</span></div>
					</div>
					<button type="button" data-bs-toggle="modal" data-bs-whatever="Start Free Trial"
							data-bs-target="#request-demo"
							class="Fz($font-size-16) D(ib)--md Mt(10px) Mt(0px)--md Mend(10px) W(100%) W(a)--xs button button--line--rd">
						Start Free Trial
					</button>
					<button type="button" data-bs-toggle="modal" data-bs-whatever="Request Demo"
							data-bs-target="#request-demo"
							class="js-modal Fz($font-size-16) D(ib)--md Mt(10px) Mt(0px)--md W(100%) W(a)--xs button">
						Request
						Demo
					</button>

				</div>
			</div>
			<div class="W(100%) W(5/12)--md">
				<div class="dms owl-carousel owl-theme">
					<div class="item">
						<img src="<?= base_url("assets/images/gst/gst-solution-banner.jpg") ?>" class="img-fluid"
							 alt="WeP GST Solutions">
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

	<section class="bg-sky-light section">
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
			<div class="row justify-content-center">
				<div class="col-lg-3">
					<img src="<?php echo base_url('assets/images/gst/wep-software.jpg') ?>" class="img-fluid"
						 alt="WeP GST Solutions">
				</div>
				<div class="col-lg-auto align-self-center">
					<h4 class="Fz($font-size-42)--md Fz($font-size-24) text-dark-blue Mb(0px) Lh($line-height-headings) Fw(600) Ta(c)">
						Why Choose WeP<br> GST Software ?
					</h4>
				</div>
			</div>

			<ul class="md Pstart(0) C($color-mine-shaft) List(n) row mt-5 justify-content-center">
				<li class="Mb(15px) col-lg-4">
					<ul class="row Pstart(0) C($color-mine-shaft) List(n)">
						<li class="col-lg-auto col-auto">
							<img src="<?php echo base_url('assets/images/icon/support.png') ?>" class="img-fluid"
								 alt="WeP GST Solutions">
						</li>
						<li class="col-lg-8 col-8 align-self-center">
							Experienced <br> Technical Support
						</li>
					</ul>
				</li>
				<li class="Mb(15px) col-lg-4">
					<ul class="row Pstart(0) C($color-mine-shaft) List(n)">
						<li class="col-lg-auto col-auto">
							<img src="<?php echo base_url('assets/images/icon/control.png') ?>" class="img-fluid"
								 alt="WeP GST Solutions">
						</li>
						<li class="col-lg-8 col-8 align-self-center">
							Role & Location Based Access <br> Control for User Management
						</li>
					</ul>
				</li>
			</ul>
			<ul class="md Pstart(0) C($color-mine-shaft) List(n) row justify-content-center">
				<li class="Mb(15px) col-lg-4">
					<ul class="row Pstart(0) C($color-mine-shaft) List(n)">
						<li class="col-lg-auto col-auto">
							<img src="<?php echo base_url('assets/images/icon/erp.png') ?>" class="img-fluid"
								 alt="WeP GST Solutions">
						</li>
						<li class="col-lg-8 col-8 align-self-center">
							Compatible with all ERP & <br> Accounting Software
						</li>
					</ul>
				</li>
				<li class="Mb(15px) col-lg-4">
					<ul class="row Pstart(0) C($color-mine-shaft) List(n)">
						<li class="col-lg-auto col-auto">
							<img src="<?php echo base_url('assets/images/icon/user.png') ?>" class="img-fluid"
								 alt="WeP GST Solutions">
						</li>
						<li class="col-lg-8 col-8 align-self-center">
							User Friendly Dashboard and <br> Downloadable Reports
						</li>
					</ul>
				</li>
			</ul>
			<ul class="md Pstart(0) C($color-mine-shaft) List(n) row justify-content-center">
				<li class="Mb(15px) col-lg-4">
					<ul class="row Pstart(0) C($color-mine-shaft) List(n)">
						<li class="col-lg-auto col-auto">
							<img src="<?php echo base_url('assets/images/icon/data-validation.png') ?>"
								 class="img-fluid" alt="WeP GST Solutions">
						</li>
						<li class="col-lg-8 col-8 align-self-center">
							99.99% Uptime and 100+ <br> Data Validation Parameters
						</li>
					</ul>
				</li>
				<li class="Mb(15px) col-lg-4">
					<ul class="row Pstart(0) C($color-mine-shaft) List(n)">
						<li class="col-lg-auto col-auto">
							<img src="<?php echo base_url('assets/images/icon/invoice.png') ?>" class="img-fluid"
								 alt="WeP GST Solutions">
						</li>
						<li class="col-lg-8 col-8 align-self-center">
							Invoice Generation <br> Module
						</li>
					</ul>
				</li>
			</ul>
			<ul class="md Pstart(0) C($color-mine-shaft) List(n) row justify-content-center">
				<li class="Mb(15px) col-lg-4">
					<ul class="row Pstart(0) C($color-mine-shaft) List(n)">
						<li class="col-lg-auto col-auto">
							<img src="<?php echo base_url('assets/images/icon/login.png') ?>" class="img-fluid"
								 alt="WeP GST Solutions">
						</li>
						<li class="col-lg-8 col-8 align-self-center">
							Single Login for GST Returns,<br>Reconcillations, e-Invoice & <br> E-Way Bill
						</li>
					</ul>
				</li>
				<li class="Mb(15px) col-lg-4">
					<ul class="row Pstart(0) C($color-mine-shaft) List(n)">
						<li class="col-lg-auto col-auto">
							<img src="<?php echo base_url('assets/images/icon/supplier.png') ?>" class="img-fluid"
								 alt="WeP GST Solutions">
						</li>
						<li class="col-lg-8 col-8 align-self-center">
							Supplier and Customer <br> Master Data Management
						</li>
					</ul>
				</li>
			</ul>
			<!-- </div> -->
			<!-- </div> -->
		</div>
	</section>
	<section class="bg-light-grey section">
		<!--        <div class="bg-5x8-dot right-top-7"></div>-->
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
			<div class="row">
				<div class="col-lg-6">
					<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">
						GST return filing software</h4>
					<ul class="Pstart(20px) C($color-mine-shaft)">
						<li class="Mb(5px)"> Takes care of monthly, quarterly, and annual GST compliances</li>
						<li class="Mb(5px)">GSTR-1, GSTR-2(Purchase register), GSTR-3B, GSTR-6, GSTR-8, and GSTR-9</li>
						<li class="Mb(5px)">Handy and coherent navigation of options</li>
						<li class="Mb(5px)">Template repository</li>
						<li class="Mb(5px)">User friendly templates with highly explanatory attributes annexure</li>
						<li class="Mb(5px)">Validate, upload, and save- Just 3 steps to file any return</li>
						<li class="Mb(5px)">Comprehensible error description for quick rectification</li>
						<li class="Mb(5px)">Fast uprun from GST</li>
						<li class="Mb(5px)">Supports submission and filing of return with DSC</li>
						<li class="Mb(5px)">Supports bulk uploads and downloads in shortest time</li>
						<li class="Mb(5px)">Easy support seeking mechanism and dedicated support resource for speedy
							resolution of issues and grievances
						</li>
					</ul>
				</div>
				<div class="col-lg-6 align-self-center">
					<!--                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Lh($line-height-headings) Ta(c) Mb(0) Fw(600)">Management of Change (MOC)</h4>-->
					<!--                    <p class="Lh(2) text-dark-blue Mb(20px) Fw(500) Ta(c)">Process Flow of MOC</p>-->
					<img src="<?php echo base_url('assets/images/gst/WeP-GST-Dashboard.png'); ?>"
						 alt="Dashboard | GST Platform for GST Return Filing"
						 class="img-fluid">
				</div>
			</div>
		</div>
	</section>
	<section class="Bg($color-white) section">
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
			<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">
				GST reconciliation software- Reconciliation between GSTR-2 and 2A and GSTR-6 and 6A</h4>
			<div class="row">
				<div class="col-lg-6 align-self-center Mb(0)--md Mb(15px)">
					<img src="<?php echo base_url('assets/images/gst/WeP-GST-Reconciliation.png'); ?>"
						 alt="Reconciliation | GST Reconciliations"
						 class="img-fluid">
				</div>
				<div class="col-lg-6">
					<ul class="Pstart(20px) C($color-mine-shaft)">
						<li class="Mb(5px)">Detailed dashboard enhances visibility of ITC discrepancies at both summary
							and supplier level
						</li>
						<li class="Mb(5px)">Action oriented, segmented information like matched documents, missing
							documents, and mismatched documents
						</li>
						<li class="Mb(5px)">Automatic system matching fastens reconciliation process</li>
						<li class="Mb(5px)">Multiple options to resolve apparent mismatches due to inconsistent document
							details
						</li>
						<li class="Mb(5px)">Hold invoices option, in line with GST provision, to defer ITC claims</li>
						<li class="Mb(5px)">No separate reconciliation for amendments as same is incorporated with the
							original return data
						</li>
						<li class="Mb(5px)">Enables precise and accurate claim ITC</li>
						<li class="Mb(5px)">Automatic mail triggering mechanism notifies discrepancies to vendors,
							captures and forwards replies from vendors
						</li>
						<li class="Mb(5px)">Separate and independent setting to configure features</li>
						<li class="Mb(5px)">Various useful reports to enable better and timely decision making</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="bg-light-grey section">
		<!--        <div class="bg-5x8-dot right-top-7"></div>-->
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
			<div class="row">
				<div class="col-lg-6">
					<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">
						Data privacy</h4>
					<ul class="Pstart(20px) C($color-mine-shaft)">
						<li class="Mb(5px)">Information system audit and assurances</li>
						<li class="Mb(5px)">Data back up plans, Business continuity plans and disaster recovery plans
						</li>
						<li class="Mb(5px)">Stringent employee work environment policies to avoid data misuse</li>
					</ul>
					<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">
						Reports</h4>
					<ul class="Pstart(20px) C($color-mine-shaft)">
						<li class="Mb(5px)">MIS reports</li>
						<li class="Mb(5px)">Log files with track of every minute information uploaded and downloaded
						</li>
						<li class="Mb(5px)">Various in-built comparison reports to analyse and take decision</li>
						<li class="Mb(5px)">Swift and Bulk download of reports from GST pertaining to multiple GSTIN’s
							and periods at once
						</li>
					</ul>
				</div>
				<div class="col-lg-6 align-self-center">
					<!--                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Lh($line-height-headings) Ta(c) Mb(0) Fw(600)">Management of Change (MOC)</h4>-->
					<!--                    <p class="Lh(2) text-dark-blue Mb(20px) Fw(500) Ta(c)">Process Flow of MOC</p>-->
					<img src="<?php echo base_url('assets/images/gst/WeP-GST-Reports-1.png'); ?>"
						 alt="Reports | MIS reports | GST return filing"
						 class="img-fluid">
				</div>
			</div>
		</div>
	</section>
	<section class="Bg($color-white) section">
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
			<div class="row">
				<div class="col-lg-6 Mb(0)--md Mb(15px)">
					<img src="<?php echo base_url('assets/images/gst/WeP-GST-e-Way-Bill.png'); ?>"
						 alt="Wep GST Panel | E-way bill status"
						 class="img-fluid">
				</div>
				<div class="col-lg-6 align-self-center">
					<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">
						E-Way bill</h4>
					<ul class="Pstart(20px) C($color-mine-shaft)">
						<li class="Mb(5px)">Exclusive dashboard with glimpse of useful compliance statistics</li>
						<li class="Mb(5px)">Quick and bulk generation of e-way bill using templates</li>
						<li class="Mb(5px)">Easy up dation and cancellation of e-way bills</li>
						<li class="Mb(5px)">View, print and download e-way bill option</li>
						<li class="Mb(5px)">Various useful reports on e-way bills generated</li>
						<li class="Mb(5px)">Initiate action on e-way bill generated by others like rejection</li>
						<li class="Mb(5px)">Customizable features to trigger e-mails on successful generation of e-way
							bills
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="bg-light-grey section">
		<!--        <div class="bg-5x8-dot right-top-7"></div>-->
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
			<div class="row">
				<div class="col-lg-6">
					<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">
						e-Invoicing</h4>
					<ul class="Pstart(20px) C($color-mine-shaft)">
						<li class="Mb(5px)">Informative dashboard providing useful insights</li>
						<li class="Mb(5px)">Supports both generation of e-Invoice through Integration with ERP and
							directly in WEP ASP using templates
						</li>
						<li class="Mb(5px)">Facilitates quick generation of Invoice Reference Number</li>
						<li class="Mb(5px)">View/print and download e-Invoice with entity’s logo</li>
						<li class="Mb(5px)">Generate and cancel e-Invoice associated e-way bills</li>
						<li class="Mb(5px)">Reports on e-Invoice data with varied status</li>
						<li class="Mb(5px)">Handy support system</li>
					</ul>
				</div>
				<div class="col-lg-6 align-self-center">
					<!--                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Lh($line-height-headings) Ta(c) Mb(0) Fw(600)">Management of Change (MOC)</h4>-->
					<!--                    <p class="Lh(2) text-dark-blue Mb(20px) Fw(500) Ta(c)">Process Flow of MOC</p>-->
					<img src="<?php echo base_url('assets/images/gst/WeP-GST-e-Invoice.png'); ?>"
						 alt="Wep GST Panel | E invoice status"
						 class="img-fluid">
				</div>
			</div>
		</div>
	</section>
	<section class="section3">
		<div class="container">
			<div class="row justify-content-center">
				<h3 class="text-center Mb(25px) Fw(600) text-white Fz($font-size-30)--md Fz($font-size-24)">We deliver
					great experiences
					through our phygital approach. Grow faster, start today.</h3>
			</div>
			<div class="text-center">
					<a download href="<?= base_url('assets/doc/WeP-GST-Software-2-Page-Brochure.pdf')?>" type="button" class="btn btn-outline-light w-auto" id="pb">Download brochure</a>
			</div>
		</div>
	</section>
</main>
