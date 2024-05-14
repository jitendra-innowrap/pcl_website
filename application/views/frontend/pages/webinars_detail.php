<main class="wrapper" id="content">
	<section class="Pt(100px)--md Pt(80px)--xs bg-orange-gradiant">
		<div class="dots-pattern-top"></div>
		<div class="dots-pattern-top-right"></div>
		<div class="dots-pattern-bottom"></div>
		<div class="Pb(80px)--md Pb(80px) Pt(90px) Py(90px)--md Px(20px)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
			<div class="row">
				<div class="col-md-7">
					<div class="webinar-page-title Pt(0px)--md Pt(60px)--xs">
						<h6 class="Mb(10px) text-dark">Webinars</h6>
						<h1 class="Mb(30px) Fz($font-size-36)--sm Fw(600) text-white"><?php echo $result['title'] ?></h1>
						<h4 class="Fw(600) Fz($font-size-18) Mb(15px)"><i class="ti-calendar"></i> <?php echo date('d M, Y', strtotime($result['date'])); ?> | <i class="ti-time"></i> <?php echo date('h:i',strtotime($result['from_time'])); ?>
							- <?php echo date('h:i a',strtotime($result['to_time'])); ?></h4>
						<h4 class="webinar-timer Fz($font-size-18) Fw(600) Mb(30px)"><i class="ti-time"></i> Duration - <?php echo $result['duration'];?> minutes</h4>
						<p class="Fz($font-size-18) Fw(400) text-white">SPEAKERS</p>
						<?php if ($speakers) { ?>
							<ul class="webinar-member-inner">
								<?php foreach ($speakers as $speaker) { ?>
									<li>
										<div class="media">
											<img src="<?php echo base_url($speaker['photo']); ?>"
												 alt=""/>
										</div>
										<div class="list-content">
											<h4><?php echo $speaker['name']; ?></h4>
											<p><?php echo $speaker['designation']; ?>
												, <?php echo $speaker['company']; ?></p>
										</div>
									</li>
								<?php } ?>
							</ul>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-5 position-relative">
					<div class="webinar-form">
						<div class="webinar-form-inner">
							<h4 class="text-center Fw(600) Mb(30px)">Get Recording Now</h4>
							<form method="post" action="<?php echo base_url('webinars-video/'.$result['slug']);?>" enctype="multipart/form-data" onsubmit="gtag_report_conversion()">
								<input type="hidden" name="webinar" value="<?php echo $result['title'];?>">
								<div class="row">
									<div class="col-md-12 mb-4">
										<label for="firstname">First Name:</label>
										<input type="text" class="form-control" name="first_name" placeholder="First Name" required>
									</div>
									<div class="col-md-12 mb-4">
										<label for="firstname">Last Name:</label>
										<input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
									</div>
									<div class="col-md-12 mb-4">
										<label for="firstname">Email Address:</label>
										<input type="email" class="form-control" name="user_email" placeholder="name@demo.com" required>
									</div>
									<p class="antispam">Leave this empty: <input type="text" name="url" /></p>
									<p class="antispam">Leave this empty: <input type="email" name="email" /></p>
									<div class="col-md-12 mb-4">
										<label for="">Would you like a demo of the Wep platform</label>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="Wep_platform" id="Wep_platform1" value="Yes" checked>
											<label class="form-check-label" for="Wep_platform1">
												Yes
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="Wep_platform" id="Wep_platform1" value="No">
											<label class="form-check-label" for="Wep_platform2">
												No
											</label>
										</div>
									</div>
									<div class="col-md-12">
										<button type="submit" class="btn btn-dark btn-webinar-form" name="submit">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="Pt(0px)--md Pt(40px)">
		<!--		<div class="overlay-grid"></div>-->
		<div class="Pb(0)--md Pb(0) Pt(90px) Py(90px)--md Px(20px)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
			<div class="row">
				<div class="col-md-7 mb-3">
					<?php echo $result['description'];?>
				</div>
			</div>
		</div>
	</section>
	<?php if ($recent_webinar){?>
	<section class="bg-orange-gradiant Py(50px)">
		<div class="Maw(1200px) Mx(a) Px(20px) Mb(50px)">
			<h2 class="M(0) Ta(c) Fz($font-size-36)--md Fz($font-size-30)--sm Fz($font-size-24) Fw($font-weight-bold) Lh($line-height-headings) text-white">Explore Our Other Webinars</h2>
		</div>
		<div class="Maw(1200px) Mx(a) Px(20px) Mb(30px)">
			<div class="D(f)--sm Fld(r) Jc(c) Flw(w) other-webinars">
				<?php foreach ($recent_webinar as $item){?>
				<div class="W(4/12)--md W(6/12)--sm W(100%) Bxz(bb) Px(10px) Mb(20px)">
					<div class="js-clickable-card arrow-hover Cur(p) P(25px) Trsp(a) Trsdu(0.3s) H(100%) D(f) Fld(c) Jc(sb)">
						<p class="Fz($font-size-14) Mt(0) Mb(30px)">
							<a href="<?php echo base_url('webinars/'.$item['slug']);?>" class="js-main-link C($color-new-font-dark) D(b) Td(n)"><?php echo $item['title'];?></a>
						</p>
						<a href="<?php echo base_url('webinars/'.$item['slug']);?>" class="btn-webinar">Watch Webinar</a>
					</div>
				</div>
				<?php }?>
			</div>
		</div>
	</section>
	<?php }?>
</main>
