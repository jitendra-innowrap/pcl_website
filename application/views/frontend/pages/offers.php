<main class="wrapper" id="content">
	<section class="Pt(100px)--md bg-orange-gradiant position-relative">
		<div class="dots-pattern-left light"></div>
		<div class="dots-pattern-right bottom light"></div>
		<div class="Pb(150px)--md Pt(100px) Pt(100px)--md Px(0)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="ebook-page-title text-center text-white">
						<h1 class="Mb(25px) Fw(700) Fz($font-size-40)">Offers</h1>
						<h4 class="Mb(40px) Fw(700) Fz($font-size-22)"> Sharing our experiences and success stories</h4>
					</div>
					<?php if ($offers && $offers_categories){?>
					<div class="site-filters clearfix center  m-b40">
						<ul class="filters" data-toggle="buttons">
							<li data-filter="" class="btn active">
								<input type="radio">
								<a href="javascript:void(0);" class="site-button-secondry button-sm radius-xl"><span>All</span></a>
							</li>
							<?php foreach ($offers_categories as $category):?>
							<li data-filter="<?= $category['category_slug']?>-filter" class="btn">
								<input type="radio">
								<a href="javascript:void(0);" class="site-button-secondry button-sm radius-xl"><span><?= $category['category_name']?></span></a>
							</li>
							<?php endforeach;?>
						</ul>
					</div>
					<?php } else{ echo '<img class="img-fluid mx-auto d-block" src="'.base_url('assets/images/icon/coming-soon.png').'" alt="soon"/>';}?>
				</div>
			</div>
		</div>
	</section>
	<?php if ($offers){?>
	<section class="Pt(0)--md Bg($color-white) position-relative">
		<div class="Pb(60px)--md Pb(60px) Pt(0) Pt(60px)--xs Py(40px)--md Maw(1200px) Mx(a)">
			<div id="masonry" class="Mt(-175px)--lg row">
				<?php foreach ($offers as $offer):?>
				<div class="col-md-4 mb-4 p-2 card-container <?= $offer['category_slug']?>-filter">
					<div class="wsk-cp-product">
						<div class="wsk-cp-img" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#offer-enquiry" data-offer="<?= urlencode(base64_encode($offer['offer_title']))?>" data-img="<?= base_url($offer['offer_image'])?>" data-json='<?= $offer['offer_data']?>'>
							<img src="<?= base_url($offer['img_thumb'])?>" alt="<?= $offer['offer_image_alt']?>" class="img-fluid" />
						</div>
						<div class="wsk-cp-text">
							<div class="title-product">
								<h3><a href="#offer-enquiry" data-bs-toggle="modal" data-bs-target="#offer-enquiry" data-offer="<?= urlencode(base64_encode($offer['offer_title']))?>" data-img="<?= base_url($offer['offer_image'])?>" data-json='<?= $offer['offer_data']?>'><?= $offer['offer_title']?></a></h3>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
	</section>
	<?php }?>
</main>
<div class="modal fade" id="offer-enquiry" tabindex="-1" role="dialog" data-mktoid="1043" aria-labelledby="read-content">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<button type="button"
					class="js-close-modal offer-enquiry-close modal-as-page_D(n) Fxs(0) Cur(p) C($color-dark-grey) Bg(n) Bd(n) P(0) M(0) Pos(a) End(20px)--xs T(20px)--xs T(10px) End(10px)"
					title="Close modal" data-bs-dismiss="modal" aria-label="Close">
				<svg width="20px" height="20px">
					<use xlink:href="#icon-close"></use>
				</svg>
			</button>
			<div class="Jc(sb) Fxw(w) Fxw(nw)--md Fxd(cr) Fxd(r)--md ">
				<div class="H(100%) Bgc($color-white) Bdrstend(4px) Bdrsbend(4px) overflow-hidden">
					<div class="row">
						<div class="col-lg-6 Pend(0)--md Pos(r) img-preloader">
							<img id="offer-img" class="img-fluid Pos(r)"/>
						</div>
						<div class="col-lg-6 Pstart(0)--sm Pstart(20px)--xs bg-light">
							<div class="W(100%) Bxz(bb) Px(20px)--md Py(30px)--md P(20px)">
								<form id="read-content-form" method="post" action="<?php echo base_url('form/offer_form'); ?>" onsubmit="gtag_report_conversion()">
									<div class="Ta(c) Mb(20px)">
										<h2 class="Fz(24px) Fw($font-weight-medium) Mb(5px) Ta(start) Mt(0) modal-title-1">Contact Us</h2>
									</div>
									<input type="hidden" name="offer">
									<div class="Mb(10px)">
										<label class="Fz($font-size-13)--sm Fz($font-size-14)--md Fw($font-weight-medium) Tt(n)" for="inquiry-name">
											Full Name<sup>*</sup> </label>
										<input class="W(100%) input-text" type="text" id="inquiry-name" name="first_name" data-qa="inquiry-name" required/>
									</div>
									<p class="antispam">Leave this empty: <input type="email" name="email" /></p>
									<div class="Mb(10px)">
										<label class="Fz($font-size-13)--sm Fz($font-size-14)--md Fw($font-weight-medium) Tt(n)"
											   for="modal-req-demo-v1-email">Email<sup>*</sup> </label>
										<input class="W(100%) input-text" type="email" id="modal-req-demo-v1-email" name="cust_email" data-qa="modal-req-demo-rd-v1-email" required/>
									</div>
									<div class="Mb(10px)">
										<label class="Fz($font-size-13)--sm Fz($font-size-14)--md Fw($font-weight-medium) Tt(n)" for="modal-req-demo-v1-pnumber">Mobile
											Number<sup>*</sup> </label>
										<input class="W(100%) input-text js-phone" type="tel" id="modal-req-demo-v1-pnumber" name="phone" data-qa="modal-req-demo-rd-v1-pnumber" required/>
									</div>
									<div class="Mb(10px)">
										<label class="Fz($font-size-13)--sm Fz($font-size-14)--md Fw($font-weight-medium) Tt(n)" for="ask_us">Ask Us<sup>*</sup> </label>
										<input class="W(100%) input-text" type="text" id="ask_us" name="ask_us" required/>
									</div>
									<div class="Mt(10px)">
										<button type="submit" class="button W(100%)" name="submitform">Contact Us</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="offer-description"></div>
				</div>
			</div>
		</div>
	</div>
</div>
