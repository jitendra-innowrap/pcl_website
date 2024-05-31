<!--==============================
    Breadcumb
    ============================== -->
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcrumb-bg.png">
  <!-- bg animated image/ -->
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-md-8">
        <div class="breadcumb-content">
          <h1 class="breadcumb-title">Blog Details</h1>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="breadcumb-menu text-md-end">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><a href="<?php echo base_url('blog'); ?>">Blog</a></li>
          <li class="active">Blog Details</li>
        </ul>
      </div>
    </div>

  </div>
</div>

<?php 
  if(isset($data['blog_date'])){
    $dateString = $data['blog_date'];
    $date = new DateTime($dateString);
    $formattedDate = $date->format('d M Y');
  }else{
    $formattedDate = '';
  }
?>

<!--==============================
    Blog Area  
    ==============================-->
<section class="blog-area space-top space-extra-bottom">
  <div class="container page-layout right-sidebar">
    <div class="row gx-40 blog-page-with-sideba">
      <div class="col-xxl-12">
        <div class="row gy-4 all-posts-wrappe  justify-content-center">
          <div class="col-12 col-md-10 single-post-item">
            <article class="post-details blog-single" style="text-align: center;">
              <div class="post-img blog-img blog-custom-img">
                <img class="w-100" src="<?php echo isset($data['image']) ? $data['image'] :'';?>" alt="image_alt">
              </div>
              <div class="post-contents with-thum-img blog-content">
                <div class="post-meta-item blog-meta">
                  <a><?php echo isset($data['author']) ? strtoupper($data['author']) :'';?></a>
                  <a><?php echo $formattedDate; ?></a>
                  <a><?php echo isset($data['categories']) ? $data['categories'] :'';?></a>
                </div>
                <h3 class="post-title blog-title"><?php echo isset($data['title']) ? $data['title'] :'';?></h3>
                <div class="post-content blog-text">
                  <?php echo isset($data['content']) ? $data['content'] :'';?>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
      <div class="col-xxl-12">
        <div class="title-area text-center title-anim">
          <span class="sub-title style2">Our Blog Posts
          </span>
          <h2 class="sec-title">Latest from our Journal</h2>
        </div>

        <div class="row flex-row-reverse">
          <?php 
        if(isset($blog['0'])){        

            $formattedDate = '';
            $dateString = $blog['0']['blog_date'];
            $date = new DateTime($dateString);
            $formattedDate = $date->format('d M Y');
    ?>
          <div class="col-lg-4 mb-30 mb-lg-0">
            <div class="blog-grid style2 style-big title-anim">
              <div class="blog-img">
                <img src="<?php echo $blog['0']['image_medium']; ?>" alt="<?php echo $blog['0']['image_alt']; ?>">
              </div>
              <div class="blog-content">
                <div class="post-meta-item blog-meta">
                  <a><?php echo strtoupper($blog['0']['author']); ?></a>
                  <a><?php echo $formattedDate; ?></a>
                  <a><?php echo $blog['0']['categories']; ?></a>
                </div>
                <h3 class="blog-title"><a
                    href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['0']['slug']; ?>"><?php echo $blog['0']['title']; ?></a>
                </h3>
                <!-- <div class="post-content blog-text">
                <p><?php echo $blog['0']['content']; ?> ...</p>
            </div> -->
                <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['0']['slug']; ?>"
                  class="link-btn style2">Continue Reading <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <?php } ?>
          <div class="col-lg-8">
            <?php 
            if(isset($blog['1'])){        

                $formattedDate = '';
                $dateString = $blog['1']['blog_date'];
                $date = new DateTime($dateString);
                $formattedDate = $date->format('d M Y');
        ?>
            <div class="blog-grid style2 style-small title-anim">
              <div>
                <div class="blog-img">
                  <img style="max-height:275px;" src="<?php echo $blog['1']['image_medium']; ?>"
                    alt="<?php echo $blog['1']['image_alt']; ?>">
                </div>
              </div>
              <div class="blog-content">
                <div class="post-meta-item blog-meta">
                  <a><?php echo strtoupper($blog['1']['author']); ?></a>
                  <a><?php echo $formattedDate; ?></a>
                  <a><?php echo $blog['1']['categories']; ?></a>
                </div>
                <h3 class="blog-title"><a
                    href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['1']['slug']; ?>"><?php echo $blog['1']['title']; ?></a>
                </h3>
                <!-- <div class="post-content blog-text">
                <p><?php echo $blog['1']['content']; ?> ...</p>
            </div> -->
                <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['1']['slug']; ?>"
                  class="link-btn style2">Continue Reading <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
            <?php } 
         if(isset($blog['2'])){        

            $formattedDate = '';
            $dateString = $blog['2']['blog_date'];
            $date = new DateTime($dateString);
            $formattedDate = $date->format('d M Y');
        ?>
            <div class="blog-grid style2 style-small title-anim">
              <div>
                <div class="blog-img">
                  <img style="max-height:275px;" src="<?php echo $blog['2']['image_medium']; ?>"
                    alt="<?php echo $blog['2']['image_alt']; ?>">
                </div>
              </div>
              <div class="blog-content">
                <div class="post-meta-item blog-meta">
                  <a><?php echo strtoupper($blog['2']['author']); ?></a>
                  <a><?php echo $formattedDate; ?></a>
                  <a><?php echo $blog['2']['categories']; ?></a>
                </div>
                <h3 class="blog-title"><a
                    href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['2']['slug']; ?>"><?php echo $blog['2']['title']; ?></a>
                </h3>
                <!-- <div class="post-content blog-text">
                <p><?php echo $blog['2']['content']; ?> ...</p>
            </div> -->
                <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $blog['2']['slug']; ?>"
                  class="link-btn style2">Continue Reading <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>