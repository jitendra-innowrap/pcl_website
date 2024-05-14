<main class="wrapper" id="content">
	<section class="Pt(100px)--md Pt(100px) bg-orange-gradiant position-relative">
		<div class="dots-pattern-left light"></div>
		<div class="dots-pattern-right bottom light"></div>
		<div class="Pb(60px)--md Pb(60px) Pt(60px) Pt(60px)--md Px(0)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="faq-page-title text-center text-white">
						<h1 class="Mb(25px) Fw(700) Fz($font-size-40)--md Fz($font-size-34)">Frequently Asked Questions</h1>
						<div class="faq-search-bar">
							<input class="form-control" name="faq_search" required>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="position-relative" id="faqs-category-list">
		<div class="Py(50px)--md Py(40px) Ov(h) Px(0)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
			<div class="row justify-content-center" id="content-wrapper">
				<div class="col-sm-3 position-relative overflow-hidden">
					<ul class="faq-accordion-menu" id="faq-list">
						<?php foreach ($faq_list as $k => $fad_category){?>
						<li><a href="#<?php echo url_title(strtolower($fad_category['name']),'-');?>" class="<?php echo $k == 0 ? 'active-menu':''?> Fw(600)"><?php echo $fad_category['name'];?></a></li>
						<?php }?>
					</ul>

				</div>
				<div class="col-sm-9 faq-list" id="target-scroll">
					<?php foreach ($faq_list as $k => $fad_category){?>
					<h3 class="faq-heading Fw(700)" id="<?php echo url_title(strtolower($fad_category['name']),'-');?>"><?php echo $fad_category['name'];?></h3>
					<div class="accordion faq-accordion mb-5" id="accordion-<?php echo $k;?>">
						<div class="accordion-item">
							<?php foreach ($fad_category['faqs'] as $j => $faq){ ?>
							<h2 class="accordion-header Fz($font-size-18)" id="heading<?php echo $k+$j;?>">
								<button class="accordion-button collapsed  text-start" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $k+$j;?>" aria-expanded="true" aria-controls="collapse<?php echo $k+$j;?>">
									<?php echo $j+1;?>.	<?php echo $faq['question'];?>
								</button>
							</h2>
							<div id="collapse<?php echo $k+$j;?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $k+$j;?>" data-bs-parent="#accordion-<?php echo $k;?>">
								<div class="accordion-body">
									<?php echo $faq['answer'];?>
								</div>
							</div>
							<?php }?>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</section>
</main>
