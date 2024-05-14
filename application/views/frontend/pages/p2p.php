<main class="wrapper" id="content">
	<section class="section bg-light-grey Pt(70px) Pt(100px)--md Ov(h) Mt(15px) Pos(r)">
		<div class="bg-5x8-dot right-top-7 D(b)--md D(n)"></div>
		<div class="Py(100px)--md Py(40px) Maw(1200px) M(a) D(f)--md Ai(c) Jc(sb)">
			<div class="W(100%) W(6/12)--md">
				<div class="Ta(start)--md Ta(c) W(12/12)--sm W(100%)--lg Mx(a) Mx(0)--md">
					<h1 class="Fz($font-size-28)--md Fz($font-size-24)--sm Fz($font-size-24) Mt(0) Mb(20px) Lh($line-height-default) Fw(700)">
						Discover how easy procurement can be</h1>
					<p class="Fz($font-size-18)--md Fz($font-size-16) Pend(20px) Mt(0) Mb(30px)">Eliminate all sources of friction
						throughout the procurement process,
						from order placement to payment
						management</p>
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
			<div class="W(100%) W(6/12)--md">
				<picture><img
							src="<?php echo base_url('assets/images/p2p/p2p-banner.png'); ?>"
							srcset="<?php echo base_url('assets/images/p2p/p2p-banner.png'); ?>"
							alt="WeP procure to pay software solutions" class="img-fluid"/>
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
				<div class="col-lg-6 Mb(0)--md Mb(15px)">
					<img src="<?php echo base_url('assets/images/p2p/Image-1.png'); ?>" alt="Best E procurement software | digital procurement software" class="img-fluid">
				</div>
				<div class="col-lg-6 align-self-center">
					<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">
						Reimagining convenience in Procurement</h4>
					<p class="Lh(2) Mb(20px) Fw(500) Fz($font-size-16)">By standardizing every step along the way during
						a
						procurement cycle, our Procure-to-Pay solution makes
						managing product acquisition truly a child’s play. Be it
						generation and dispatch of purchase requests,
						purchase orders, goods receipt, or invoices, our
						automation solution makes every task easy to handle</p>
				</div>
			</div>
		</div>
	</section>
	<section class="bg-light-grey section">
		<!--        <div class="bg-5x8-dot right-top-7"></div>-->
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
			<div class="row">
				<div class="col-lg-6 align-self-center Mb(0)--md Mb(15px)">
					<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">
						Checks and Balances to ensure no errors </h4>
					<p class="Lh(2) Mb(20px) Fw(500) Fz($font-size-16)">Be it approvals for purchase requests to quality
						checks for goods received, our solution provides
						easy management of approvals as well as checks at
						multiple levels to prevent any mistake at any step of the procurement process</p>
				</div>
				<div class="col-lg-6">
					<!--                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Lh($line-height-headings) Ta(c) Mb(0) Fw(600)">Management of Change (MOC)</h4>-->
					<!--                    <p class="Lh(2) text-dark-blue Mb(20px) Fw(500) Ta(c)">Process Flow of MOC</p>-->
<!--					<img src="--><?php //echo base_url('assets/images/p2p/wep-P2P-WIMS2-120.png'); ?><!--" alt="Purchase request | purchase to pay software" class="img-fluid">-->
					<div class="d-block">
						<div class="dms owl-carousel owl-theme">
							<div class="item">
								<img src="<?= base_url("assets/images/p2p/Image-2a.png")?>" class="img-fluid" alt="Purchase request | purchase to pay software">
							</div>
							<div class="item">
								<img src="<?= base_url("assets/images/p2p/Image-2b.png")?>" class="img-fluid" alt="Purchase request | purchase to pay software">
							</div>
							<div class="item">
								<img src="<?= base_url("assets/images/p2p/Image-2c.png")?>" class="img-fluid" alt="Purchase request | purchase to pay software">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section Bg($color-white)">
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
			<div class="row">
				<div class="col-lg-6">
					<img src="<?php echo base_url('assets/images/p2p/Image-3.png'); ?>" alt="Dashboard | procurement management software" class="img-fluid">
				</div>
				<div class="col-lg-6 align-self-center">
					<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">
						Informed Vendor Selection</h4>
					<p class="Lh(2) Mb(20px) Fw(500) Fz($font-size-16)">Get the best deals on goods and products every
						time you need to place a purchase order through
						access to a centralized database of vendors offering
						desired products required along with expected time
						to delivery, pricing, and past vendor performance records.</p>
				</div>
			</div>
		</div>
	</section>
	<section class="section bg-light-grey">
		<!--        <div class="bg-5x8-dot right-top-7"></div>-->
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
			<div class="row">
				<div class="col-lg-6 align-self-center Mb(0)--md Mb(15px)">
					<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">
						Payment Processing</h4>
					<p class="Lh(2) Mb(20px) Fw(500) Fz($font-size-16)">Choose between manual and automated payments
						depending on preference. Match payments with
						invoices and store centralized transaction records
						for future reference.</p>
				</div>
				<div class="col-lg-6">
					<!--                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Lh($line-height-headings) Ta(c) Mb(0) Fw(600)">Management of Change (MOC)</h4>-->
					<!--                    <p class="Lh(2) text-dark-blue Mb(20px) Fw(500) Ta(c)">Process Flow of MOC</p>-->
					<img src="<?php echo base_url('assets/images/p2p/Image-4.png'); ?>" alt="Payment processing software | purchase to pay software" class="img-fluid">
				</div>
			</div>
		</div>
	</section>
	<section class="section Bg($color-white)">
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
			<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Ta(c) Fw(600)">
				Empower your procurement department to function smarter</h4>
			<p class="Lh(2) Mb(20px) Fw(500) Ta(c) C($color-mine-shaft) Maw(1000px) D(b) mx-auto">Free up your employee
				time to focus on tasks that require human intervention such as price negotiations with vendors,
				identifying cost-saving opportunities, and so on while leaving the mundane tasks to automation. Procure
				more with a leaner team at better prices and reap cost savings.</p>
			<h4 class="Fz($font-size-22)--md Fz($font-size-22) text-dark-blue Mb(25px) Lh($line-height-headings) Ta(c) Fw(600)">
				Procurement is about obtaining the right goods at the right price: Don’t let the monotony of
				documentation bog you down from achieving your goals</h4>
			<p class="Lh(2) Mb(20px) Fw(500) Ta(c) C($color-mine-shaft) Maw(1000px) D(b) mx-auto">It is a pain to be
				spending more hours creating and sending purchase requests and invoices for every procurement order
				rather than getting the actual procurement done at favourable terms. Unleash the potential of your
				procurement team by freeing them off tasks that they should not be wasting time on.</p>
		</div>
	</section>
	<section class="section3">
		<div class="container">
			<div class="row justify-content-center">
				<h3 class="text-center Mb(25px) Fw(600) text-white Fz($font-size-30)--md Fz($font-size-24)">We deliver great experiences
					through our phygital approach. Grow faster, start today.</h3>
			</div>
			<div class="text-center">
				<a href="<?php echo base_url('contact-us'); ?>">
					<button type="button" class="btn btn-light " id=pb>Contact Us</button>
				</a>
			</div>
		</div>
	</section>
</main>
