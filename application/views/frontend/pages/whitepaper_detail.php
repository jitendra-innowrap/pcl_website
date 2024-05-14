<main class="wrapper" id="content">
	<section class="Pt(150px) Pt(80px)--xs Bg($color-white) position-relative">
		<div class="dots-pattern-left light"></div>
		<div class="dots-pattern-right bottom light"></div>
		<div class="container">
			<div class="row">
				<div class="<?php if (empty($gst_notification)) {
					echo 'col-md-12';
				} else {
					echo 'col-md-8';
				} ?> Mb(30px)--sm">
					<div class="mx-auto Mt(0)--md Mt(30px)--xs">
						<h1 class="Fw(600) Fz($font-size-34) Fz($font-size-22)--xs"><?php echo $result['title']; ?></h1>
						<div class="pb-3 text-dark flex items-center justify-center">
							<div class="Fw(500) Fz($font-size-14) text-theme-color Mb(10px)"><i
										class="ti-calendar"></i> <?php echo date('d M, Y', strtotime($result['notification_date'])); ?>
								<i class="bi bi-three-dots-vertical"></i> <i
										class="ti-user"></i> <?php echo $result['author']; ?></div>
						</div>
					</div>

					<div class="mx-auto">
						<img src="<?php echo base_url($result['image']); ?>" alt="<?php echo $result['image_alt']; ?>" class="img-fluid Mah(500px)"/>
					</div>

					<div class="mx-auto py-3 content-section">
						<?php echo $result['content']; ?>
					</div>

				</div>
				<?php if ($gst_notification) { ?>
					<div class="col-md-4">
						<h4 class="Fz($font-size-24) Fw(600) Mb(0)">Recent Post</h4>
						<?php foreach ($gst_notification as $notification) { ?>
							<div class="blogs-card-recent">
								<div class="blogs-card-body">
									<div class="blogs-card-image">
										<a target="_blank" href="<?php echo $notification->is_url_route == 1 ? $notification->route_url : base_url('gst-notification/'.$notification->slug) ; ?>">
											<img src="<?php echo base_url($notification->image_medium); ?>"
												 alt="<?php echo $notification->image_alt; ?>">
										</a>
									</div>
									<div class="blogs-card-content">
										<div class="Fw(500) Fz($font-size-12) text-theme-color Mb(10px)"><i
													class="ti-calendar"></i> <?php echo date('d M, Y', strtotime($notification->notification_date)); ?>
											<i
													class="bi bi-three-dots-vertical"></i> <i
													class="ti-user"></i> <?php echo $notification->author; ?>
										</div>
										<a target="_blank" href="<?php echo $notification->is_url_route == 1 ? $notification->route_url : base_url('gst-notification/'.$notification->slug) ; ?>">
											<h4><?php echo $notification->title; ?></h4>
										</a>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
</main>
