<main class="wrapper" id="content">
    <section class="section bg-light-grey Pt(70px) Pt(100px)--md Ov(h) Mt(15px) Pos(r)">
        <div class="bg-5x8-dot right-top-7 D(b)--md D(n)"></div>
        <div class="Py(100px)--md Py(40px) Maw(1200px) M(a) D(f)--md Ai(c) Jc(sb)">
            <div class="W(100%) W(7/12)--md">
                <div class="Ta(start)--md Ta(c) W(12/12)--sm W(100%)--lg Mx(a) Mx(0)--md">
                    <h1
                        class="Fz($font-size-28)--md Fz($font-size-24)--sm Fz($font-size-24) Mt(0) Mb(20px) Lh($line-height-default) Fw(700)">
                        Reduce 29% on Printing cost with WeP Managed Print Services</h1>
                    <p class="Fz($font-size-18)--md Fz($font-size-16) Pend(20px)--md Mt(0) Mb(30px)">WeP will Manage your Printing Service
                        securely giving you time to focus on growing your business. Never get bothered by the CAPEX of
                        the printer, Interest you lose on the CAPEX, 10%-15% Cost on spare parts, Cost on Toner, or
                        document security.</p>
                    <div class="Mb(30px)">
                        <a href="<?php echo base_url('contact-us');?>" onclick="dataLayer.push({'event' : 'formSubmitted', 'formName' : 'Request Demo'})" type="button" class="Fz($font-size-16) D(ib)--md Mt(10px) C($color-white):h Mt(0px)--md W(100%) W(a)--xs button">Contact Us</a>
                        <button type="button" data-bs-toggle="modal" data-bs-whatever="Start Free Trial"  data-bs-target="#request-demo" class="Fz($font-size-16) D(ib)--md Mt(10px) Mt(0px)--md Mend(10px) W(100%) W(a)--xs button button--line--rd">Start Free Trial
                        </button>
                    </div>
                </div>
            </div>
            <div class="W(100%) W(5/12)--md">
                <picture><img src="<?php echo base_url('assets/images/mps/Wep_PSP_Management.png'); ?>"
                        srcset="<?php echo base_url('assets/images/mps/Wep_PSP_Management.png'); ?>" alt="WeP Managed Print Services" class="img-fluid" />
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
            <div class="Maw(1000px) D(b) Mx(a) Mb(35px)">
                <h4
                    class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(15px) Lh($line-height-headings) Fw(600) Ta(c)">
                    What is MPS?</h4>
                <p class="Lh(2) Mb(20px) Fw(500) Fz($font-size-16) Ta(c)">Managed Print Services allow an organization
                    to gain visibility and control of all its printing and optimize it, which helps save money, enables
                    the organization to print more efficiently.</p>
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
            </div>
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <h4
                        class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(15px) Lh($line-height-headings) Fw(600)">
                        Asset Plus Service Solution (APSS)</h4>
                    <p class="Lh(2) Mb(20px) Fw(500) Fz($font-size-16)">WeP APSS helps organization to improvise their
                        print infrastructure without any capital investment. Under this, printers are deployed at the
                        customer’s premises and commercials are on a ‘Fixed Monthly Rental’ and ‘Pay Per Page’ basis.
                    </p>
                    <ul class="Pstart(20px) C($color-mine-shaft)">
                        <li class="Mb(5px)"> Low Cost of Ownership</li>
                        <li class="Mb(5px)"> Availability of 36 to 60 months Contract Period</li>
                        <li class="Mb(5px)"> No AMC charges</li>
                        <li class="Mb(5px)"> Remote Monitoring Tool</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <!--                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Lh($line-height-headings) Ta(c) Mb(0) Fw(600)">Management of Change (MOC)</h4>-->
                    <!--                    <p class="Lh(2) text-dark-blue Mb(20px) Fw(500) Ta(c)">Process Flow of MOC</p>-->
                    <img src="<?php echo base_url('assets/images/p2p/banner--2-5.png');?>" alt="Asset Plus Service Solution (APSS) | managed print services solutions" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <section class="section bg-light-grey">
        <div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
            <div class="row">
                <div class="col-lg-6">
                    <img src="<?php echo base_url('assets/images/mps/v_Image 1 .png');?>" alt="WeP Asset Management (WAM)  | managed print service providers" class="img-fluid">
                </div>
                <div class="col-lg-6 align-self-center">
                    <h4
                        class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(15px) Lh($line-height-headings) Fw(600)">
                        WeP Asset Management (WAM)</h4>
                    <p class="Lh(2) Mb(20px) Fw(500) Fz($font-size-16)">In WeP Asset Management, we provide support on your
                        existing print infrastructure. That means, there is no upfront investment. What you get is a
                        reduction in manpower and improved productivity. Your printers are always up and running.</p>
                    <ul class="Pstart(20px) C($color-mine-shaft)">
                        <li class="Mb(5px)"> Pay for what you print</li>
                        <li class="Mb(5px)"> Low Per Page Cost</li>
                        <li class="Mb(5px)"> Remote Monitoring Tools</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="Bg($color-white) section">
        <div class="bg-5x8-dot right-top-7"></div>
        <div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <h4
                        class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(15px) Lh($line-height-headings) Fw(600)">
                        Secure Printing </h4>
                    <p class="Lh(2) Mb(20px) Fw(500) Fz($font-size-16)">WeP Secure print solution aims to provide
                        security around printing, scanning, and copying. It also facilitate pull printing, quota
                        restriction, mobile printing, mail printing, etc. which help in decreasing the costs through
                        reduction of wastage.</p>
                    <ul class="Pstart(20px) C($color-mine-shaft)">
                        <li class="Mb(5px)"> Premium Security - Confidential documents reach authorized personnel only
                        </li>
                        <li class="Mb(5px)"> Cost Control - Reduce number of printers and eliminate wasteful printing
                        </li>
                        <li class="Mb(5px)"> Better Printer Management - Improve efficiency with load balancing &
                            monitor usage from central location</li>
                        <li class="Mb(5px)"> Protect your Environment - Save paper, toner and electricity by reducing
                            prints/printers</li>
                        <li class="Mb(5px)"> Contact Less Printing with Follow Me Print feature</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <!--                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Lh($line-height-headings) Ta(c) Mb(0) Fw(600)">Management of Change (MOC)</h4>-->
                    <!--                    <p class="Lh(2) text-dark-blue Mb(20px) Fw(500) Ta(c)">Process Flow of MOC</p>-->
                    <img src="<?php echo base_url('assets/images/mps/Secure_Printing.png');?>" alt="Secure printing Solutions | managed print services solutions" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light-grey section">
        <div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
            <div class="row">
                <div class="col-lg-6">
                    <img src="<?php echo base_url('assets/images/mps/Cloud_Printing.png');?>" alt="Cloud Printing Solutions | Managed print services in india" class="img-fluid">
                </div>
                <div class="col-lg-6 align-self-center">
                    <h4
                        class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(15px) Lh($line-height-headings) Fw(600)">
                        Cloud Printing Solutions</h4>
                    <h4
                        class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">
                        Print Anywhere, Anytime.</h4>
                    <p class="Lh(2) Mb(20px) Fw(500) Fz($font-size-16)">WeP Cloud Printing Solutions will help reduce
                        bottlenecks such as dependency on personnel to get the prints, getting prints at odd hours, or
                        chances of data leakage and security.</p>
                    <ul class="Pstart(20px) C($color-mine-shaft)">
                        <li class="Mb(5px)"> Set up a Secure WeP Cloud Printing Environment for Public Print Locations
                        </li>
                        <li class="Mb(5px)"> Maximize your productivity by allowing secure access & printing from cloud
                            storage accounts as well as physical device memory</li>
                        <li class="Mb(5px)"> Streamlines workflow by enabling end users to print documents directly</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="Bg($color-white) section">
        <div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
            <h4
                class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600) Ta(c)">
                How WeP helps you to reduce printing costs up to 29%? </h4>
            <div class="container">
                <table class="mps-table table table-bordered table-condensed">
                    <thead>
                        <tr id="red-row">
                            <th colspan="3" class="text-center">Cost Benefit Analysis for WeP MPS Vs Owned
                                Printer
                            </th>
                        </tr>
                    </thead>


                    <tr class="text-theme-color">
                        <th scope="col">Printer Model</th>
                        <th scope="col" class="text-center">Purchased Printer</th>
                        <th scope="col" class="text-center">WeP MPS</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td>A3 Printer with 30 PPM Speed</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Capital Cost</td>
                            <td>1,80,0000</td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>Period(Months)</td>
                            <td>48</td>
                            <td>48</td>
                        </tr>
                        <tr>
                            <td>Simple Interest on Capex for 4 Years @11%</td>
                            <td>99000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>IT Depriciation Rate</td>
                            <td>30%</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Assuming Pages Per Month</td>
                            <td>15000</td>
                            <td>15000</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-theme-color">Operating Cost (Per Page)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Toner Cost</td>
                            <td>25,000</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>IT Depriciation Rate</td>
                            <td>30%</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Per Page Cost</td>
                            <td>0.52</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Spare &amp; AMC Cost (@10% Per Annum)</td>
                            <td>0.52</td>
                            <td>0.10</td>
                        </tr>
                        <tr>
                            <td> Logistic and Inventory Cost (@5% Per Annum)</td>
                            <td>0.05</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-theme-color">Total Operating Cost Per Page</td>
                            <td class="fw-bold">0.67</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-theme-color">Capex Cost (Per Page)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> Printer Cost</td>
                            <td> 0.25</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> Simple Interest on Capex for 4 Years @11%</td>
                            <td>0.14</td>
                            <td></td>
                        </tr>
                        <tr class="fw-bold">
                            <td> Total Operating Cost Per Page</td>
                            <td>0.39</td>
                            <td></td>
                        </tr>
                        <tr class=" fw-bold">
                            <td>Total Cost of Ownership (TCO)</td>
                            <td>1.06</td>
                            <td>0.75</td>
                        </tr>
                        <tr class="fw-bold">
                            <td> Saving Per Page</td>
                            <td></td>
                            <td>0.31</td>
                        </tr>
                        <tr class="fw-bold" id="red-row">
                            <td>% of Saving with WeP MPS </td>
                            <td></td>
                            <td>29%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section class="section3">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="text-center Mb(25px) Fw(600) text-white Fz($font-size-30)--md Fz($font-size-24)">We deliver great experiences through our phygital approach. Grow faster, start today.</h3>
            </div>
            <div class="text-center">
                <a href="<?php echo base_url('contact-us');?>" onclick="dataLayer.push({'event' : 'formSubmitted', 'formName' : 'Request Demo'})"><button type="button" class="btn btn-light "
                        id=pb>Contact Us</button></a>
            </div>
        </div>
    </section>
</main>
<script id='pixel-script-poptin' src='https://cdn.popt.in/pixel.js?id=0660f170ded26' async='true'></script>
