<main class="wrapper" id="content">
    <section class="section bg-sky-light Pt(70px) Pt(100px)--md Ov(h) Mt(15px) Pos(r)">
        <div class="bg-5x8-dot right-top-7 D(b)--md D(n)"></div>
        <div class="Py(100px)--md Py(40px) Maw(1200px) M(a) D(f)--md Ai(c) Jc(sb)">
            <div class="W(100%) W(7/12)--md">
                <div class="Ta(start)--md Ta(c) W(12/12)--sm W(100%)--lg Mx(a) Mx(0)--md">
                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">Integrate e-Invoice with ERP & make the transition Seamless</h4>
                    <p class="Fz($font-size-18)--md Fz($font-size-16) Pend(20px)--md Pend(0) Mt(0) Mb(30px)">e-Invoice is a revolutionary step in GST regime. Though it is currently applicable for entities with turnover exceeding 100 crores, the GST authorities are intending to extend it to all taxpayers from financial year 2021-22 for specified set of transactions. Our solution with different offerings and customization options, ensures a smooth transition and easy compliance of e-invoicing provisions.</p>
                    <button type="button" data-bs-toggle="modal" data-bs-whatever="Start Free Trial"  data-bs-target="#request-demo" class="Fz($font-size-16) D(ib)--md Mt(10px) Mt(0px)--md Mend(10px) W(100%) W(a)--xs button button--small button--line--rd">Start Free Trial
                        </button>
                        <button data-bs-toggle="modal" data-bs-whatever="Start Free Trial"  data-bs-target="#request-demo" class="Fz($font-size-16) button C($color-white):h D(ib)--md M(0)">Request Demo</button>
                </div>
            </div>
            <div class="W(100%) W(5/12)--md Mt(30px)--xs Z(1) Pos(r)">
                <picture><img
                        src="<?php echo base_url('assets/images/einvoice/794X551.png'); ?>"
                        srcset="<?php echo base_url('assets/images/einvoice/794X551.png'); ?>"
                        alt="WeP Digital Invoicing System" class="img-fluid"/>
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
                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">WeP e-Invoicing Offerings</h4>
                    <ul class="Pstart(20px) C($color-mine-shaft)">
                    <li class="Mb(5px)">  Support Manual, SFTP and ERP integrated e-Invoice solutions</li>
                    <li class="Mb(5px)"> Provides both ASP and GSP model of services</li>
                    <li class="Mb(5px)"> Tie up with specialized integration partners for SAP, Oracle etc</li>
                    <li class="Mb(5px)"> Provides support for in-house implementation of e-Invoicing</li>
                    <li class="Mb(5px)"> Tight information security policies</li>

                    </ul>
                </div>
                <div class="col-lg-6">
                    <!--                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Lh($line-height-headings) Ta(c) Mb(0) Fw(600)">Management of Change (MOC)</h4>-->
                    <!--                    <p class="Lh(2) text-dark-blue Mb(20px) Fw(500) Ta(c)">Process Flow of MOC</p>-->
                    <img src="<?php echo base_url('assets/images/gst/GST-Solution-5.png'); ?>" alt="invoice | gst e invoicing Software" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <section class="section bg-light-grey">
<!--        <div class="bg-5x8-dot right-top-7"></div>-->
        <div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
            <div class="row">
                <div class="col-lg-6 align-self-center Mb(0)--md Mb(15px)">
                    <img src="assets/images/gst/Wep-1-03.png" alt="Reports | MIS Reports | electronic invoicing software" class="img-fluid">
                </div>
                <div class="col-lg-6 align-self-center">
                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(15px) Lh($line-height-headings) Fw(600)">e-Invoice at ease</h4>
                    <ul class="Pstart(20px) C($color-mine-shaft) Mb(25px)">
                        <li class="Mb(5px)"> Distinct and enhanced summary dashboard</li>
                        <li class="Mb(5px)">  Supports bulk upload of e-Invoice data through excel template</li>
                        <li class="Mb(5px)">  Quick generation of e-Invoices with just 3 steps: Validate, upload, and generate</li>
                        <li class="Mb(5px)">  Cancel e-Invoice with just a few clicks</li>
                        <li class="Mb(5px)">  Create and cancel IRN based e-Way bill</li>
                        <li class="Mb(5px)">  e-Invoice print and download PDF option </li>
                        <li class="Mb(5px)">  Features to customize e-Invoice print format like entity’s logo</li>
                        <li class="Mb(5px)">  Simple exception handling process</li>
                        <li class="Mb(5px)">  Well trained support team</li>
                    </ul>
                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(15px) Lh($line-height-headings) Fw(600)">Varieties of Reports Available</h4>
                    <ul class="Pstart(20px) C($color-mine-shaft)">
                        <li class="Mb(5px)">  View export and download e-Invoice of multiple GSTIN’s </li>
                        <li class="Mb(5px)">  Report on IRN generated for varied range of period</li>
                        <li class="Mb(5px)">  Reports to enable easy preparation of GSTR-1 data</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section Bg($color-white)">
        <div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
            <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">e-Way Bill</h4>
            <p class="Lh(2) Mb(20px)">Every registered entity must generate e-Way bills for supplies involving movement of goods exceeding prescribed threshold. We help you for a problem free generation of e-Way bills mitigating the risk of disruption to business operations and penalising consequences. Undoubtedly our services simplify your e-Way bill compliances without having to visit GST e-Way bill portal</p>
            <div class="row">
                <div class="col-lg-6 align-self-center Mb(0)--md Mb(15px)">
                    <ul class="Pstart(20px) C($color-mine-shaft)">
                        <li class="Mb(5px)">  Comprehensive dashboard for quick visibility on e-Way bill compliances</li>
                        <li class="Mb(5px)">  Easy interface. Simple and user-friendly template</li>
                        <li class="Mb(5px)">  Supports centralized and location-based e-Way bill generation</li>
                        <li class="Mb(5px)">  Saves time with bulk generation of e-Way bills</li>
                        <li class="Mb(5px)">  Facilitates easy updation of vehicle, transporter details, extension of validity of e-way bill and addition of multi-vehicles</li>
                        <li class="Mb(5px)">  Option to view, print and download PDF of e-Way bills</li>
                        <li class="Mb(5px)">  Permits concurrent e-Way bill generation for multiple GSTIN’s</li>
                        <li class="Mb(5px)">  Cancel e-Way bill with just a click</li>
                        <li class="Mb(5px)">  Rejection of inward e-Way bills</li>
                        <li class="Mb(5px)">  Exclusive settings to configure related features</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <img src="<?php echo base_url('assets/images/gst/GST-Solution-4.png'); ?>" alt="Summary | gst e way bill software summary" class="img-fluid">
                </div>

            </div>
        </div>
    </section>
   
    <section class="section bg-light-grey">
        <div class="bg-5x8-dot right-top-7 D(b)--md D(n)"></div>
        <div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
            <div class="row">
                <div class="col-lg-6 Mb(0)--md Mb(15px)">
                    <!--                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Lh($line-height-headings) Ta(c) Mb(0) Fw(600)">Management of Change (MOC)</h4>-->
                    <!--                    <p class="Lh(2) text-dark-blue Mb(20px) Fw(500) Ta(c)">Process Flow of MOC</p>-->
                    <img src="assets/images/einvoice/Various-Reports.png" alt="Reports | Best gst e invoicing Software" class="img-fluid">
                </div>
                <div class="col-lg-6 align-self-center">
                <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">Various Reports Available </h4>
                    <ul class="Pstart(20px) C($color-mine-shaft)" class="m-0">
                    <li class="Mb(5px)">  Report on active/inactive and erroneous e-Way bills</li>
                    <li class="Mb(5px)">  Report on e-Way bills generated directly in NIC</li>
                    <li class="Mb(5px)">  Report on inward e-Way bills generated</li>
                    <li class="Mb(5px)">  Report on e-Way bills rejected by client</li>
                    <li class="Mb(5px)">  Report on e-Way bills assigned to transporters</li>
                    <li class="Mb(5px)">  GSTR-1 Vs e-Way bill</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section Bg($color-white)">
        <div class="Maw(1200px) Mx(a) Py(60px)">
            <div class="row">
                <div class="col-lg-6 align-self-center Mb(0)--md Mb(15px)">
                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">GST Return solutions</h4>
                   <ul class="Pstart(20px) C($color-mine-shaft)">
                    
                   <li class="Mb(5px)">  Subscribe to WeP ASP portal and enjoy simplified filing in just 3 steps for all returns: Validate, upload, and save</li>
                   <li class="Mb(5px)">  Transfer your worries of return filing to our professionals with the managed filing services</li>
                   <li class="Mb(5px)">  Various MIS reports and logs to meet complete audit trail and reporting requirements</li>
                   <li class="Mb(5px)">  Quick and easy upload to/download from GST portal</li>
                   <li class="Mb(5px)">  Simplified reconciliation and automated communication mechanism to vendors on discrepancies</li>
                   <li class="Mb(5px)">  Easy interface, navigation, and user management</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <img src="assets/images/einvoice/DMS-imgs1-02.png" alt="Dashboard | GST Reconciliations | invoice management software" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <section class="section3">
        <div class="container">
        <div class="row justify-content-center">
                <h3 class="text-center Mb(25px) Fw(600) text-white Fz($font-size-30)--md Fz($font-size-24)">We deliver great experiences through our phygital approach. Grow faster, start today.</h3>
            </div>
            <div class="text-center">
				<a download href="<?= base_url('assets/doc/WeP-e-invoice-2-Page-Brochure.pdf')?>" type="button" class="btn btn-outline-light w-auto" id="pb">Download brochure</a>
            </div>
        </div>
    </section>
</main>
