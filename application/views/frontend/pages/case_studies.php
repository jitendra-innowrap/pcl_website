<main class="wrapper" id="content">
    <section class="Pt(100px)--md bg-orange-gradiant position-relative">
        <div class="dots-pattern-left light"></div>
        <div class="dots-pattern-right bottom light"></div>
        <div class="Pb(150px)--md Pt(100px) Pt(100px)--md Px(0)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="ebook-page-title text-center text-white">
                        <h1 class="Mb(25px) Fw(700) Fz($font-size-40)">Case Studies</h1>
                        <h4 class="Mb(40px) Fw(700) Fz($font-size-22)"> Sharing our experiences and success stories</h4>
                    </div>
                    <div class="site-filters clearfix center  m-b40">
                        <ul class="filters" data-toggle="buttons">
                            <li data-filter="" class="btn active">
                                <input type="radio">
                                <a href="javascript:void(0);" class="site-button-secondry button-sm radius-xl"><span>All</span></a>
                            </li>
                            <?php foreach ($casestudies_category as $value){?>
                                <li data-filter="<?php echo $value->name?>" class="btn">
                                    <input type="radio">
                                    <a href="javascript:void(0);" class="site-button-secondry button-sm radius-xl"><span><?php echo $value->name?></span></a>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="Pt(0)--md Bg($color-white) position-relative">
        <div class="Pb(60px)--md Pb(60px) Pt(0) Pt(60px)--xs Py(40px)--md Px(20px)--lg Px(0)--md Px(20px) Maw(1200px) Mx(a)">
            <div id="masonry" class="row Mt(-175px)--lg">
                <?php foreach ($casestudies as $casestudy){ ?>
                    <div class="col-md-4 mb-4 card-container <?php echo $casestudy->category;?>">
                        <div class="blogs-card">
                            <div class="blogs-card-body">
                                <div class="blogs-card-image">
                                    <a href="<?php echo base_url('case-studies/'.$casestudy->slug);?>">
                                        <img src="<?php echo base_url($casestudy->image);?>" alt="<?php echo $casestudy->image_alt;?>">
                                    </a>
                                </div>
                                <div class="blogs-card-content">
                                    <div class="Fw(500) Fz($font-size-14) text-theme-color Mb(10px)"><i class="ti-calendar"></i> <?php echo $casestudy->case_date;?> <i class="bi bi-three-dots-vertical"></i> <i class="ti-user"></i> <?php echo $casestudy->author;?></div>
                                    <a href="<?php echo base_url('case-studies/'.$casestudy->slug);?>">
                                        <h4><?php echo $casestudy->title;?></h4>
                                    </a>
                                    <p><?php echo substr(ltrim(strip_tags($casestudy->content)), 0, 175);?>...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </section>

</main>
