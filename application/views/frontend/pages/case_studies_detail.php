<main class="wrapper" id="content">
    <section class="Pt(150px) Pt(80px)--xs Bg($color-white) position-relative">
        <div class="dots-pattern-left light"></div>
        <div class="dots-pattern-right bottom light"></div>
        <div class="container">
            <div class="row">
                <div class="<?php if (empty($casestudies)) {
                    echo 'col-md-12';
                } else {
                    echo 'col-md-8';
                } ?> Mb(30px)--sm">
                    <div class="mx-auto Mt(0)--md Mt(30px)--xs">
                        <h1 class="Fw(600) Fz($font-size-34) Fz($font-size-22)--xs"><?php echo $result['title']; ?></h1>
                        <div class="pb-3 text-dark flex items-center justify-center">
                            <div class="Fw(500) Fz($font-size-14) text-theme-color Mb(10px)"><i
                                        class="ti-calendar"></i> <?php echo date('d M, Y', strtotime($result['case_date'])); ?>
                                <i class="bi bi-three-dots-vertical"></i> <i
                                        class="ti-user"></i> <?php echo $result['author']; ?></div>
                        </div>
                    </div>

                    <div class="d-block">
						<img src="<?php echo base_url($result['image']); ?>" alt="<?php echo $result['title']; ?>" class="img-fluid"/>
                    </div>

                    <div class="mx-auto py-3 content-section">
                        <?php echo $result['content']; ?>
                    </div>

                </div>
                <?php if ($casestudies) { ?>
                    <div class="col-md-4">
                        <h4 class="Fz($font-size-24) Fw(600) Mb(0)">Recent Post</h4>
                        <?php foreach ($casestudies as $casestudy) { ?>
                            <div class="blogs-card-recent">
                                <div class="blogs-card-body">
                                    <div class="blogs-card-image">
                                        <a href="<?php echo base_url('case-studies/' . $casestudy->slug); ?>">
                                            <img src="<?php echo base_url($casestudy->image_medium); ?>"
                                                 alt="<?php echo $casestudy->image_alt; ?>">
                                        </a>
                                    </div>
                                    <div class="blogs-card-content">
                                        <div class="Fw(500) Fz($font-size-12) text-theme-color Mb(10px)"><i
                                                    class="ti-calendar"></i> <?php echo date('d M, Y', strtotime($casestudy->case_date)); ?>
                                            <i
                                                    class="bi bi-three-dots-vertical"></i> <i
                                                    class="ti-user"></i> <?php echo $casestudy->author; ?>
                                        </div>
                                        <a href="<?php echo base_url('case-studies/' . $casestudy->slug); ?>">
                                            <h4><?php echo $casestudy->title; ?></h4>
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
