<main class="wrapper" id="content">
	<section class="bg-light-grey Pt(70px) Pt(100px)--md Ov(h) Mt(15px)">
		<div class="Py(100px)--md Py(40px) Maw(1200px) M(a) D(f)--md Ai(c) Jc(sb)">
			<div class="W(100%) W(7/12)--md">
				<div class="Ta(start)--md Ta(c) W(12/12)--sm W(100%)--lg Mx(a) Mx(0)--md">
					<h1 class="Fz($font-size-28)--md Fz($font-size-24)--sm Fz($font-size-24) Mt(0) Mb(20px) Lh($line-height-default) Fw(700)">
						Protect your people, facilities, communities, and business from risks and unintended
						consequences through WeP Management of Change Automation ( MOC)</h1>
					<p class="Fz($font-size-18)--md Fz($font-size-16) Pend(20px)--md Pend(0) Mt(0) Mb(30px)">With DMS for MOC, you can be change-ready by
						implementing and managing multiple change programs across projects, business units, or
						organization, simultaneously</p>
					<div class="Mb(30px)">
						<button type="button" data-bs-whatever="Start Free Trial" data-bs-toggle="modal"
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
			</div>
			<div class="W(100%) W(5/12)--md">
				<picture><img
							src="<?php echo base_url('assets/images/moc/moc.png'); ?>"
							srcset="<?php echo base_url('assets/images/moc/moc.png'); ?>"
							alt="Wep management of change process" class="img-fluid"/>
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
				<div class="col-lg-6 col-md-6">
					<div class="Px(30px)">
						<img src="<?php echo base_url('assets/images/moc/bag.svg'); ?>" alt="Best Management of change software | document management software"
							 class="img-fluid Mb(15px)">
						<h4 class="Fz($font-size-24)--md Fz($font-size-24) Mb(20px) Lh($line-height-headings) Fw(600)">
							Be agile with the everchanging business demands</h4>
						<p class="Lh(2) text-dark-blue Mb(0)">Management of Change (MOC) is needed for every change that
							is planned to be implemented within an organization – be it the movement of assets, tools,
							or resources, or implementation of new software, or changes in the facility. Document
							Management System (DMS) for MOC ensures the safety, health, and environmental risks are
							controlled and mitigated to successfully drive the business outcomes.</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="Px(30px)">
						<img src="<?php echo base_url('assets/images/moc/customized.svg'); ?>" alt="Best Management of change software | document management software"
							 class="img-fluid Mb(15px)">
						<h4 class="Fz($font-size-24)--md Fz($font-size-24) Mb(20px) Lh($line-height-headings) Fw(600)">
							Create the customized and configurable workflows as per your needs, in a jiffy </h4>
						<p class="Lh(2) text-dark-blue Mb(0)">Various organizations have trusted DMS for MOC by
							switching from their primitive paper systems, worksheets, or even an in-house Environmental,
							Health and Safety (EHS) solution. DMS for MOC has transformed their struggle with Business
							Process Automation into a cakewalk.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="bg-sky-light section">
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
			<div class="row">
				<div class="col-lg-6 align-self-center Mb(0)--md Mb(15px)">
					<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">
						Simplify operational change</h4>
					<ul class="Pstart(20px) C($color-mine-shaft)">
						<li class="Mb(22px)">Maintain a centralized record of changes and approvals</li>
						<li class="Mb(22px)">Control changes through integrated checklists and approvals</li>
						<li class="Mb(22px)">Create customized workflow, forms, and checklists for various
							stakeholders
						</li>
						<li class="Mb(22px)">Administer roles and permissions at ease</li>
						<li class="Mb(0)">Share artifacts, like images and documents, concerning change</li>
					</ul>
				</div>
				<div class="col-lg-6">
					<!--                    <h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Lh($line-height-headings) Ta(c) Mb(0) Fw(600)">Management of Change (MOC)</h4>-->
					<!--                    <p class="Lh(2) text-dark-blue Mb(20px) Fw(500) Ta(c)">Process Flow of MOC</p>-->
					<img src="assets/images/moc/moc-flow-chart.png" alt="Process flow | Management of change software" class="img-fluid">
				</div>
			</div>
		</div>
	</section>
	<section class="bg-sky-light section">
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
			<div class="row">
				<div class="col-lg-6 Mb(0)--md Mb(15px)">
					<img src="assets/images/moc/Organization-level-Visibility.png" alt="Orgazation level visiblity | organizational change management" class="img-fluid">
				</div>
				<div class="col-lg-6 align-self-center">
					<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Fw(600)">
						Organization-level Visibility</h4>
					<ul class="Pstart(20px) C($color-mine-shaft)">
						<li class="Mb(22px)">Maintain organization-level visibility with centralized change management
						</li>
						<li class="Mb(22px)">Manage change requests through a dashboard</li>
						<li class="Mb(22px)">Creating an automated e-mail trigger for various milestones or missed
							deadlines
						</li>
						<li class="Mb(0)">Evaluating possible risks and best solutions for risk mitigation</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="Bg($color-white) section">
		<div class="Maw(1200px) Mx(a) Py(60px) Pt(120px)--md Pb(80px)--md">
			<h4 class="Fz($font-size-24)--md Fz($font-size-24) Mb(25px) text-dark-blue Lh($line-height-headings) Ta(c) Fw(600)">
				Maintain Compliance</h4>
			<p class="Lh(2) C($color-mine-shaft) Mb(20px) Fw(500) Ta(c) Maw(1000px) D(b) mx-auto">Maintain compliance
				with Management of Change requirements | Generating audit reports on various changes with a click |
				Creating a traceable audit trail at every stage of the workflow.</p>
			<img src="assets/images/moc/Maintain-Compliance.png" class="img-fluid d-block mx-auto Mb(70px)" alt=""/>
			<h4 class="Fz($font-size-24)--md Fz($font-size-24) text-dark-blue Mb(25px) Lh($line-height-headings) Ta(c) Fw(600)">
				Doing MOC the right way</h4>
			<p class="Lh(2) Mb(20px) Fw(500) Ta(c) C($color-mine-shaft) Maw(1000px) D(b) mx-auto">Managing MOC through
				paper systems, MS Excel, or even an in-house Environmental, Health and Safety (EHS) solution, drains
				you out; especially if you have facilities in multiple locations. Tons of man-hours are wasted on tasks
				that should be automated, like compiling reports, tracking bottlenecks, and following-up about missed
				deadlines. A good MOC tool takes all the pain of planning, organizing, implementing, storing artifacts,
				raising flags, and so on – it does the heavy lifting for you by doing all of that and more,
				seamlessly.</p>
			<h4 class="Fz($font-size-22)--md Fz($font-size-22) text-dark-blue Mb(25px) Lh($line-height-headings) Ta(c) Fw(600)">
				Why DMS for MOC becomes even more necessary during and post COVID times? </h4>
			<p class="Lh(2) Mb(20px) Fw(500) Ta(c) C($color-mine-shaft) Maw(1000px) D(b) mx-auto">COVID has made some
				irreversible changes to our lifestyle and work - people have changed, a new office set-up is needed, the
				existing processes are outdated. It’s okay if you have managed changes with your primitive methods so
				far. However, with a never-seen and a never-experienced situation like COVID when even the smartest
				organizations have failed to cope, you need state-of-the-art software like DMS for MOC to drive change
				management programs. </p>
			<h4 class="Fz($font-size-22)--md Fz($font-size-22) text-dark-blue Mb(25px) Lh($line-height-headings) Ta(c) Fw(600)">
				Some of the probable risks that you might run into post-pandemic:</h4>
			<p class="Lh(2) Mb(20px) Fw(500) Ta(c) C($color-mine-shaft) Maw(1000px) D(b) mx-auto">How many of your
				furlough employees are going to return? Or employees who were on pay cut – what are the odds<br> that
				they haven’t looked out? </p>
			<p class="Lh(2) Mb(20px) Fw(500) Ta(c) C($color-mine-shaft) Maw(1000px) D(b) mx-auto">With all the changing
				facilities, production floors, and employees wearing masks to help social distancing, how<br>
				productivity is going to take a hit. Employees wearing masks will get exhausted and will be forced to
				take frequent<br> breaks. Have you taken that into account? </p>
			<p class="Lh(2) Mb(20px) Fw(500) Ta(c) C($color-mine-shaft) Maw(1000px) D(b) mx-auto">How many meeting,
				training and conference rooms do you need? Because now a 100 people room will be forced<br> to
				accommodate only 25 people.</p>
		</div>
	</section>
	<section class=section3>
		<div class=container>
			<div class="row justify-content-center">
				<h3 class="text-center Mb(25px) Fw(600) text-white Fz($font-size-30)--md Fz($font-size-24)">We deliver great experiences
					through our phygital approach. Grow faster, start today.</h3>
			</div>
			<div class="text-center">
				<button type="button" data-bs-toggle="modal" data-bs-whatever="Free Trial"
						data-bs-target="#request-demo" class="btn btn-outline-light " id=pb>Free Trial
				</button>
				<button type="button" data-bs-toggle="modal" data-bs-whatever="Request Demo"
						data-bs-target="#request-demo" class="btn btn-light " id=pb>Request Demo
				</button>
			</div>
		</div>
	</section>
</main>
