<main class="wrapper" id="content">
    <section class="Pt(100px)--md Pt(100px) bg-orange-gradiant position-relative">
        <div class="dots-pattern-left light"></div>
        <div class="dots-pattern-right bottom light"></div>
        <div class="Pb(120px) Pt(60px) Pt(60px)--md Px(0)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="faq-page-title text-center text-white"><h1 class="Mb(0) Fw(700) Fz($font-size-40)">
                            Ricoh</h1></div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="management-practices-container Mt(-70px)">
            <div class="Py(40px)--md Px(40px)--md P(0) text-justify">
                <div class="float-start Pend(20px)-md Pend(0)">
                    <img src="assets/images/home/wep-ricoh.png" class="ricoh-logo bg-light" alt="WeP ricoh authorized dealers">
                    <button onclick="window.open('https://www.wepmyshop.com/ricoh-products-solutions')" target="_blank" type="button" class="button button--small M(0) d-block mx-auto Mb(25px)">BUY RICOH Products/Consummables
                    </button>
                </div>
                <p class="Fz($font-size-16)--md Fz($font-size-14) text-dark">WeP Solutions Limited and Ricoh Asia Pacific Operations Limited have entered into a
                    Distributorship
                    Agreement on November, 2019. The agreement envisages Wep to sell Ricoh's products and service Ricoh's portfolio in India.
					 WeP aims to
                    address
                    the digital printing market including office automation, industrial and commercial printing products,
                    through their extensive distribution network. Through this strategic partnership, Ricoh Asia Pacific
                    and
                    WeP seek to empower
                    businesses to work smarter and be more productive, contributing to customer's business growth in
                    India.
                </p>
                <p class="Fz($font-size-16)--md Fz($font-size-14) text-dark">Ricoh is empowering digital workplaces using innovative technologies and services enabling
                    individuals to
                    work smarter.
                    For more than 80 years, Ricoh has been driving innovation and is a leading provider of document
                    management solutions, IT services,
                    communication services, commercial and industrial printing, digital cameras, and industrial
                    systems. Headquartered in Tokyo, Ricoh Group operates
                    in approximately 200 countries and regions. In the financial year ended March 2019, Ricoh Group had
                    worldwide
                    sales of 2013 billion yen(approx. 18.1 billion USD).
                </p>
                <p class="Fz($font-size-16)--md Fz($font-size-14) text-dark Mb(0)">Ricoh always believes in Creativity, Collaboration & Seamless technology for it's customer.
                    WeP with this agreement will provide the best products & services to the country's booming
                    industries
                    to make it a smarter place to work for. Ricoh Products will help you transform the way your business
                    runs.
                    This will give you one-stop solution for all your printing needs.
                </p>
            </div>
        </div>
    </div>
    <section class="Py(50px)--md Py(40px) list">
        <div class="container">

            <div class="row justify-content-center" id=card-row>
                <div class="col-lg-6">
                    <div class="card">
                        <div class=date>
                            <h3>06</h3>
                            <h5>NOV </h5>
                            <h5>2019</h5>
                        </div>
                        <img class="card-img-top w-100 P(30px)" src="assets/images/ricoh/Ricoh-Asia.png" alt="appointment | Top ricoh pinter dealers in India | ricoh distributors in india">
                        <div class="card-body Px(30px) Pb(30px) Pt(0)">
                            <h4 class="card-title">Ricoh Asia Pacific announces the
                                appointment of WeP solutions Ltd as
                                an authorized distributor in India
                            </h4>

                            <h6 class="card-subtitle text-muted">By Ricoh Asia Pacific</h6>
                            <p class="card-text">
                                Singapore, 6 November 2019 - Ricoh Asia Pacific Pte Ltd.<br>
                                ("Richo Asia Pacific"), today announced the appointment of
                                WeP Solutions Limited("WeP") as an authorized distributor for Rico printing solutions in
                                India.
                            </p>
                            <a target="_blank" href="https://www.ricoh-ap.com/news/2019/11/06/ricoh-asia-pacific-announces-the-appointment-of-wep-solutions-ltd" class="btn btn-outline-danger float-right">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class=date>
                            <h3>06</h3>
                            <h5>NOV </h5>
                            <h5>2019</h5>
                        </div>
                        <img class="card-img-top w-100 P(30px)" src="assets/images/ricoh/WeP-Solutions.jpg" alt="distributor agreement | Top ricoh pinter distributors in India">
                        <div class="card-body Px(30px) Pb(30px) Pt(0)">
                            <h4 class="card-title">WeP Solutions and Ricoh Asia Pacific entere
                                into a distributor agreement for the Indian market
                            </h4>
                            <h6 class="card-subtitle text-muted">By CRN Team</h6>
                            <p class="card-text">WeP Solutions and Ricoh Asia Pacific Operations Limited
                                ("Ricoh") have entered into a distributor agreement. Under this agreement, WeP has the
                                rights to sell
                                and service Ricoh's product portfolio that address the digital printing market in India.
                            </p>
                            <a target="_blank" href="https://www.crn.in/news/wep-solutions-and-ricoh-asia-pacific-enter-into-a-distributor-agreement-for-the-indian-market/" class="btn btn-outline-danger float-right">Read More</a>
                        </div>
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
    <section class=section3>
        <div class=container>
            <div class="row justify-content-center">
                <h3 class="text-center Mb(25px) Fw(600) Fz($font-size-30)--md Fz($font-size-24)">We deliver great experiences through our phygital approach. Grow faster, start today.</h3>
            </div>
            <div class="text-center">
                <a href="<?php echo base_url('contact-us');?>"><button type="button" class="btn btn-light "  id=pb>Contact Us</button></a>
            </div>
        </div>
    </section>
</main>
