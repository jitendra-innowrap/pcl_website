<main class="wrapper" id="content">
    <section class="Pt(100px)--md Pt(80px)--xs bg-orange-gradiant position-relative">
        <div class="dots-pattern-left light"></div>
        <div class="dots-pattern-right bottom light"></div>
        <div class="Pb(60px)--md Pb(60px) Pt(60px) Pt(60px)--md Px(0)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="faq-page-title text-center text-white"><h1 class="Mb(0) Fw(700) Fz($font-size-40)">
                            Newsroom</h1></div>
                </div>
            </div>
        </div>
    </section>
    <section class="position-relative">
        <div class="Py(50px)--md Py(40px) Ov(h) Px(0)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
            <?php if ($newsrooms) {
                foreach ($newsrooms as $newsroom) {
                    ?>
                    <div class="blog-post blog-md clearfix">
                        <div class="dlab-post-media dlab-img-effect zoom-slow">
                            <a target="_blank"
                               href="<?php echo $newsroom->is_url_route == 1 ? $newsroom->route_url : base_url('newsroom/'.$newsroom->slug) ; ?>"><img
                                        src="<?php echo $newsroom->image_medium; ?>"
                                        alt="<?php echo $newsroom->image_alt; ?>"></a>
                        </div>
                        <div class="dlab-post-info">
                            <div class="dlab-post-title">
                                <h4 class="post-title Fz($font-size-18)"><a target="_blank" href="<?php echo $newsroom->is_url_route == 1 ? $newsroom->route_url : base_url('newsroom/'.$newsroom->slug) ; ?>"><?php echo $newsroom->title; ?></a>
                                </h4>
                            </div>
                            <div class="dlab-post-meta">
                                <ul>
                                    <li class="post-date"> <?php echo date('d M, Y', strtotime($newsroom->news_date)); ?> </li>
                                    <li class="post-author"> By <a href="<?php echo $newsroom->is_url_route == 1 ? $newsroom->route_url : base_url('newsroom/'.$newsroom->slug) ; ?>"><?php echo $newsroom->author; ?></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dlab-post-text">
                                <p class="Lh(1.3) Mb(10px)"><?php echo $newsroom->sort_description; ?></p>
                            </div>
                            <div class="dlab-post-readmore">
                                <a target="_blank"
                                   href="<?php echo $newsroom->is_url_route == 1 ? $newsroom->route_url : base_url('newsroom/'.$newsroom->slug) ; ?>"
                                   class="D(if) Ai(c) Td(n) C($color-purple) Bgc($color-white) Lh(inh) Bdrs(3px) Tt(u) Fz(15px) Fw($font-weight-medium) Cur(p) Mend(10px) Mend(0)--md My(0) Mstart(0)">
                                    <span class="Mend(10px)">Read more</span>
                                    <svg width="12px" height="12px" class="Fxs(0)">
                                        <use xlink:href="#icon-arrow-right"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>

        </div>
    </section>
</main>
