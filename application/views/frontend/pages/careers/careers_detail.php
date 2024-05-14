<main class="wrapper" id="content">
	<section class="Pt(100px)--md bg-orange-gradiant position-relative">
		<div class="dots-pattern-left light"></div>
		<div class="dots-pattern-right bottom light"></div>
		<div class="Pb(60px)--md Pb(60px) Pt(60px)--md Pt(150px) Px(0)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="faq-page-title text-center text-white"><h1 class="Mb(0) Fw(700) Fz($font-size-40)"><?php echo $result['job_name'];?></h1>
						<p class="M(0) Fz($font-size-18)">Careers</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="position-relative">
		<div class="Py(50px)--md Py(40px) Ov(h) Px(0)--lg Px(0)--md Px(20px) Maw(1000px) Mx(a)">
			<div class="row justify-content-between">
				<div class="col-lg-8">
					<h6 class="Fw(600) text-muted">#WP<?php echo $result['id'];?></h6>
					<h1 class="Mb(5px) Fw(600) Fz($font-size-34)"><?php echo $result['job_name'];?></h1>
					<h4 class="Mb(10px) Fw(400) Fz($font-size-20) Mb(25px)">Department: <?php echo $result['name'];?></span></h4>
					<p class="Fw(600) Mb(7px)"><i class="ti-location-pin"></i> Location: <span class="text-muted Fw($font-weight-regular)"><?php echo $result['location'];?></p>
					<p class="Fw(600)"><i class="ti-user"></i> Number of vacancies: <?php echo $result['no_of_vacancy'];?> <span class="Px(8px)">|</span> <i class="ti-calendar"></i> Experience: <?php echo $result['experience'];?></p>
				</div>
				<div class="col-lg-4 Ta(end)">
					<a class="button button--small Ta(u)" href="#applyjob">Apply Now</a>
				</div>
			</div>
			<hr>
			<h4 class="Fz($font-size-20) Mb(25px)">Job Description</h4>
			<div class="Ov(h)">
				<?php echo $result['job_description'];?>
			</div>
		</div>
	</section>
	<section class="position-relative bg-light-grey" id="applyjob">
		<div class="Py(50px)--md Py(40px) Ov(h) Px(0)--lg Px(0)--md Px(20px) Maw(1000px) Mx(a)">
			<h4 class="text-center Mb(30px)">Apply Now</h4>
			<form name="job-apply" action="<?= base_url('career_apply')?>" enctype="multipart/form-data" method="post" onsubmit="gtag_report_conversion()">
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="">Name*</label>
						<input type="text" class="W(100%) input-text" name="fullname" placeholder="Enter full name" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Contact No.*</label>
						<input type="tel" class="W(100%) input-text" name="mobile" placeholder="Enter mobile number" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Email*</label>
						<input type="email" class="W(100%) input-text" name="uemail" placeholder="Enter email address" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="">City*</label>
						<input type="text" class="W(100%) input-text" name="city" placeholder="Enter city name" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Job Role*</label>
						<div class="Pos(r)">
							<select class="input-text W(100%) Cur(p)" name="job_role" required>
								<option value="" disabled>Select a job role</option>
								<?php foreach ($careers_role as $item):?><option value="<?= $item->job_name;?>" <?= $result['job_name'] == $item->job_name ? 'selected':''?>><?= $item->job_name;?></option><?php endforeach;?>
							</select>
							<div class="Pos(a) T(50%) End(20px) TranslateY(-50%) Pe(n)">
								<svg width="16px" height="16px" class="D(b)" viewBox="0 0 8 5">
									<use xlink:href="#icon-chevron-down"></use>
								</svg>
							</div>
						</div>
					</div>
					<div class="col-md-6 mb-3" style="display: none">
						<label for="">Role</label>
						<input type="email" class="W(100%) input-text" name="email">
						<input type="text" class="W(100%) input-text" name="website">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Resume*</label>
						<input type="file" name="file" class="W(100%) input-text" placeholder="Upload resume" required>
					</div>
				</div>
				<button class="button W(100%)" type="submit">Submit</button>
			</form>
		</div>
	</section>
</main>
