<main class="wrapper" id="content">
    <section class="Pt(100px)--md bg-orange-gradiant position-relative">
        <div class="dots-pattern-left light"></div>
        <div class="dots-pattern-right bottom light"></div>
        <div class="Pb(150px)--md Pt(100px) Pt(100px)--md Px(0)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="ebook-page-title text-center text-white">
                        <h1 class="Mb(25px) Fw(700) Fz($font-size-40)">GST Notification</h1>
                        <h4 class="Mb(40px) Fw(700) Fz($font-size-22)--md Fz($font-size-18)--xs">Get Latest updates on Goods and Service Tax, e-Invoice and e-Way bill</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="Pt(0)--md Bg($color-white) position-relative">
        <div class="Pb(60px)--md Pb(60px) Pt(0) Pt(60px)--xs Py(40px)--md Px(20px)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
            <div class="row Mt(-175px)--lg justify-content-center">
				<?php if ($gst_notification){
					foreach ($gst_notification as $item){ ?>
						<div class="col-md-4 mb-4 card-container web commerce">
							<div class="blogs-card">
								<div class="blogs-card-body">
									<div class="blogs-card-image">
										<a href="<?php echo ($item->is_url_route == 1 ? $item->route_url : base_url('gst-notification/'.$item->slug));?>" >
											<img src="<?php echo base_url($item->image_medium);?>" alt="">
										</a>
									</div>
									<div class="blogs-card-content">
										<div class="Fw(500) Fz($font-size-14) text-theme-color Mb(10px)"><i class="ti-calendar"></i> <?php echo date('d M, Y', strtotime($item->notification_date)); ?> <i class="bi bi-three-dots-vertical"></i> <i class="ti-user"></i> <?php echo $item->author;?></div>
										<a href="<?php echo ($item->is_url_route == 1 ? $item->route_url : base_url('gst-notification/'.$item->slug));?>" >
											<h4><?php echo $item->title;?></h4>
										</a>
										<p><?php echo substr(ltrim(strip_tags($item->sort_desc)), 0, 200);?>...</p>
									</div>
								</div>
							</div>
						</div>
					<?php }
				}?>
            </div>
        </div>
    </section>

</main>
