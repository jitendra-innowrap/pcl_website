<main class="wrapper" id="content">
	<section class="Pt(100px)--md bg-orange-gradiant Mb(-150px)">
		<div class="overlay-border"></div>
		<div class="Pb(80px)--md Pb(80px) Pt(90px) Py(90px)--md Px(20px)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
			<div class="row justify-content-center">
				<div class="col-md-7">
					<h1 class="Mb(70px) Fz($font-size-38)--md Fw(600) text-white text-center Lh(1.8)--sm">Here's your
						requested webinar recording and presentation deck.</h1>
				</div>
				<div class="col-md-10 position-relative">
					<div class="dots-pattern-left--50"></div>
					<div class="dots-pattern-right-50"></div>
					<div class="webinar-video">
						<?php $video_id = explode("?v=", $result['video_url']);
								$video_id = $video_id[1];?>
						<div id="player" class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $video_id;?>"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="Pt(100px)--md Bg($color-white)">
		<div class="Pb(40px)--md Pb(40px) Pt(90px) Py(40px)--md Px(20px)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
		</div>
	</section>
</main>
<script src="https://cdn.plyr.io/3.6.3/plyr.js"></script>
<link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css"/>
<script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script>
<script type="text/javascript">
	new Plyr('.player', {
		'controls':['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'pip', 'airplay', 'fullscreen'],
		'settings':['captions', 'quality', 'speed', 'loop']
	});
</script>
