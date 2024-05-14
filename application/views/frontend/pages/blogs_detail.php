<main class="wrapper" id="content">
    <section class="Pt(150px) Pt(80px)--xs Bg($color-white) position-relative">
        <div class="dots-pattern-left light"></div>
        <div class="dots-pattern-right bottom light"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 Mb(30px)--sm">
                    <div class="mx-auto">
                        <h1 class="Fw(600) Fz($font-size-34)"><?php echo $result['title']; ?></h1>
                        <div class="pb-3 text-dark flex items-center justify-center">
                            <div class="Fw(500) Fz($font-size-14) text-theme-color Mb(10px)"><i
                                        class="ti-calendar"></i> <?php echo date('d M, Y', strtotime($result['blog_date'])); ?>
                                <i class="bi bi-three-dots-vertical"></i> <i
                                        class="ti-user"></i> <?php echo $result['author']; ?></div>
                        </div>
                    </div>

                    <div class="d-block">
						<img src="<?php echo base_url($result['image']); ?>" alt="<?php echo $result['title']; ?>" class="img-fluid">
                    </div>

                    <div class="mx-auto py-3 content-section">
                        <?php echo $result['content']; ?>
                    </div>

                </div>
                <div class="col-md-4">
                    <h4 class="Fz($font-size-24) Fw(600) Mb(0)">Recent Post</h4>
                    <?php if ($blogs) {
                        foreach ($blogs as $blog) { ?>
                            <div class="blogs-card-recent">
                                <div class="blogs-card-body">
                                    <div class="blogs-card-image">
                                        <a href="<?php echo base_url('blogs/'.$blog->slug); ?>">
                                            <img src="<?php echo base_url($blog->image_medium); ?>"
                                                 alt="<?php echo $blog->image_alt;?>">
                                        </a>
                                    </div>
                                    <div class="blogs-card-content">
                                        <div class="Fw(500) Fz($font-size-12) text-theme-color Mb(10px)"><i
                                                    class="ti-calendar"></i> <?php echo date('d M, Y', strtotime($blog->blog_date)); ?> <i
                                                    class="bi bi-three-dots-vertical"></i> <i class="ti-user"></i> <?php echo $blog->author;?>
                                        </div>
                                        <a href="<?php echo base_url('blogs/'.$blog->slug); ?>">
                                            <h4><?php echo $blog->title;?></h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </section>
</main>
