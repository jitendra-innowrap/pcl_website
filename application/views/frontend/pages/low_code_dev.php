<main class="wrapper" id="content">
    <section class="section bg-light-grey Pt(70px) Pt(100px)--md Ov(h) Mt(15px) Pos(r)">
        <div class="bg-5x8-dot right-top-7 D(b)--md D(n)"></div>
        <div class="Py(100px)--md Py(40px) Maw(1200px) M(a) D(f)--md Ai(c) Jc(sb)">
            <div class="W(100%) W(6/12)--md">
                <div class="Ta(start)--md Ta(c) W(12/12)--sm W(100%)--lg Mx(a) Mx(0)--md Pend(40px)--md">
                    <h1 class="Fz($font-size-28)--md Fz($font-size-24)--sm Fz($font-size-24) Mt(0) Mb(20px) Lh($line-height-default) Fw(700)">Build custom Application for your needs 50% faster</h1>
                    <p class="Fz($font-size-18)--md Fz($font-size-16) Pend(20px)--md Pend(0) Mt(0) Mb(30px)">Build custom applications that align with your brand and business goals.</p>
                    <div class="Mb(30px)">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#request-demo" class="Fz($font-size-16) D(ib)--md Mt(10px) Mt(0px)--md Mend(10px) W(100%) W(a)--xs button button--line--rd">Start Free Trial
                        </button>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#request-demo" class="js-modal Fz($font-size-16) D(ib)--md Mt(10px) Mt(0px)--md W(100%) W(a)--xs button">Request
                            Demo
                        </button>
                    </div>
                </div>
            </div>
            <div class="W(100%) W(6/12)--md">
                <picture><img
                        src="<?php echo base_url('assets/images/low-code-dev/low-code-banner.png'); ?>"
                        srcset="<?php echo base_url('assets/images/low-code-dev/low-code-banner.png'); ?>"
                        alt="WeP low code platform" class="img-fluid"/>
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
    <section class="Bg($color-white) section">
        <div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
            <div class="row">
				<div class="col-lg-6 align-self-center Mb(0)--md Mb(15px)">
					<!--                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Lh($line-height-headings) Ta(c) Mb(0) Fw(600)">Management of Change (MOC)</h4>-->
					<!--                    <p class="Lh(2) text-dark-blue Mb(20px) Fw(500) Ta(c)">Process Flow of MOC</p>-->
					<img src="<?php echo base_url('assets/images/low-code-dev/DMS-imgs1-03.png');?>" alt="Projects | best low code development platform" class="img-fluid">
				</div>
                <div class="col-lg-6">
                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">Tailored solutions that leverage powerful WeP DMS core</h4>
                    <p class="Lh(1.5) Mb(10px) Fw(500) Fz($font-size-16)">All custom applications are built on top of the WeP DMS core that consists of powerful repository and workflow systems. Some of the advantages of having custom applications:</p>
                    <ul class="Pstart(20px) C($color-mine-shaft)">
                        <li class="Mb(5px)">Aligns to your business needs and goals</li>
                        <li class="Mb(5px)">Highly scalable to meet your future needs</li>
                        <li class="Mb(5px)">Integrate tightly with WeP document repository and WeP Workflow platform</li>
                        <li class="Mb(5px)">Cost-effective </li>
                        <li class="Mb(0)">Easy integration with the third-party applications, through RESTful API’s</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section bg-light-grey">
        <div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
            <div class="row">
                <div class="col-lg-6 Mb(0)--md Mb(15px)">
                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">Rapid App development through WeP low-code development platform</h4>
                    <p class="Lh(1.5) Mb(10px) Fw(500) Fz($font-size-16)">Get enterprise applications 50% faster with our low-code app development platform.</p>
                    <ul class="Pstart(20px) C($color-mine-shaft)">
                        <li class="Mb(5px)">Rapid development </li>
                        <li class="Mb(5px)">Low cost</li>
                        <li class="Mb(5px)">Multi-year experience team</li>
                        <li class="Mb(5px)">Suitable for SMB and large-sized customers</li>
                        <li class="Mb(0)">Advanced encryption standard, AE-256 encryption </li>
                    </ul>
                </div>
				<div class="col-lg-6 align-self-center">
					<img src="<?php echo base_url('assets/images/low-code-dev/DMS-imgs1-05.png');?>" alt="Dashboard | low code application development" class="img-fluid">
				</div>
            </div>
        </div>
    </section>
    <section class="section Bg($color-white)">
        <div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
			<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(20px) Lh($line-height-headings) Fw(600) Ta(c)">Stop creating liabilities with multiple standalone apps</h4>
			<p class="Lh(1.5) Mb(20px) Fw(500) Fz($font-size-16) Ta(c)">As an enterprise, you need to make investments in systems and applications that are futuristic and enable your organization’s potential to the fullest. Here is the comparison of having custom apps built Vs. multiple standalone apps:</p>
            <div class="row">
				<div class="col-lg-6 align-self-center Mb(0)--md Mb(15px)">
					<div class="d-block">
						<img src="<?php echo base_url('assets/images/low-code-dev/DMS-imgs1-06.png');?>" alt="Process flow | best low code development platform | Flow Design" class="img-fluid">
					</div>
				</div>
                <div class="col-lg-6">
                    <div class="Maw(900px)">

                        <ul class="Pstart(20px) C($color-mine-shaft)">
                            <li class="Mb(5px)">Multiple standalone apps work on different technologies and don’t speak well with each other – WeP  Low Code Platform</li>
                            <li class="Mb(5px)">Multiple standalone apps store and process data differently – you end up sitting on standalone silos of data. Custom Apps do it uniformly.</li>
                            <li class="Mb(5px)">Stitching multiple standalone data is expensive and difficult to achieve. Hence, difficult to derive meaningful and accurate insights for business.</li>
                            <li class="Mb(5px)">With standalone applications, you even pay for features that are not needed.</li>
                            <li class="Mb(0)">It's time-consuming to interact with multiple vendors while using multiple standalone apps. Whereas WeP’s low code apps that become an integral part of the WeP DMS system.</li>
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
                <button type="button" data-bs-toggle="modal" data-bs-whatever="Free Trial"  data-bs-target="#request-demo" class="btn btn-outline-light " id=pb>Free Trial</button>
                <button type="button" data-bs-toggle="modal" data-bs-whatever="Request Demo" data-bs-target="#request-demo" class="btn btn-light " id=pb>Request Demo</button>
            </div>
        </div>
    </section>
</main>
