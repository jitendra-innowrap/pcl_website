<main class="wrapper" id="content">
	<section class="Pt(100px)--md Ov(h) bg-orange-gradiant position-relative">
		<div class="dots-pattern-left light"></div>
		<div class="dots-pattern-right bottom light"></div>
		<div class="Pb(80px)--md Pb(80px) Pt(100px) Pt(100px)--md Ov(h) Px(0)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
			<div class="row justify-content-center">
				<div class="col-md-7">
					<div class="page-title text-center">
						<h1 class="Mb(25px) Fw(700) Fz($font-size-40)">Webinars</h1>
						<h4 class="Mb(40px) Fw(700) Fz($font-size-22)">We strive to deliver better and informative
							content through Industry speakers, customers and subject matter experts</h4>
					</div>
					<div class="site-filters clearfix center  m-b40">
						<ul class="filters Px(0)" data-toggle="buttons">
							<li data-filter class="btn active">
								<input type="radio">
								<a href="javascript:void(0);" class="site-button-secondry button-sm radius-xl"><span>All</span></a>
							</li>
							<li data-filter="upcoming" class="btn">
								<input type="radio">
								<a href="javascript:void(0);" class="site-button-secondry button-sm radius-xl"><span>Upcoming</span></a>
							</li>
							<li data-filter="recent" class="btn">
								<input type="radio">
								<a href="javascript:void(0);" class="site-button-secondry button-sm radius-xl"><span>Recent</span></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="position-relative">
		<!--		<div class="overlay-grid"></div>-->
		<div class="Py(50px)--md Py(40px) Ov(h) Px(0)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
			<div id="masonry" class="row justify-content-center">
				<?php if ($webinars) {
					$cureent_date = date('d-m-Y');
					foreach ($webinars as $webinar) { ?>
						<div class="col-md-6 mb-3 card-container <?php echo (strtotime($cureent_date) < strtotime($webinar['date']) ? 'upcoming':'recent');?>">
							<div class="webinar-card">
								<div class="webinar-card-body position-relative">
									<div class="webinar-content">
										<h4 class="web-title"><?php echo $webinar['title']; ?></h4>
										<h6 class="Fw(500) Fz($font-size-16) text-theme-color"><i
													class="ti-calendar"></i> <?php echo date('d M, Y', strtotime($webinar['date'])); ?>
											|
											<i class="ti-time"></i> <?php echo date('h:i', strtotime($webinar['from_time'])); ?>
											- <?php echo date('h:i a', strtotime($webinar['to_time'])); ?></h6>
										<?php
										echo '<p class="web-desc mb-4 text-justify">' . substr(ltrim(strip_tags($webinar['description'])), 0, 500) . "...</p>";
										if ($webinar['speakers']) { ?>
											<ul class="webinar-member">
												<?php foreach ($webinar['speakers'] as $speaker) { ?>
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
									<div class="webinar-footer">
										<?php if (strtotime($cureent_date) < strtotime($webinar['date'])) {?>
											<a target="_blank" href="<?php echo $webinar['video_url']; ?>"
											   class="btn-webinar">Register Now</a>
										<?php } else {
											?>
											<a href="<?php echo base_url('webinars/' . $webinar['slug']); ?>"
											   class="btn-webinar">Watch
												Webinar</a>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					<?php }
				} ?>
			</div>
		</div>
	</section>
</main>
