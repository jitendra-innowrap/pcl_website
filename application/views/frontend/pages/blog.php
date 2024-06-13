<style>
  p {
    font-size: 18px !important;
    line-height: 1.5 !important;
    font-weight: 400 !important;
     font-family:  "Montserrat", sans-serif !important;
    margin-bottom:10px !important;
  }
</style>

<!--==============================
  Breadcumb
  ============================== -->
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcrumb-bg.png">
  <!-- bg animated image/ -->
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-md-8">
        <div class="breadcumb-content">
          <h1 class="breadcumb-title">Blogs</h1>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="breadcumb-menu text-md-end">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="active">Blogs</li>
        </ul>
      </div>
    </div>

  </div>
</div>

<!--==============================
  Blog Area  
  ==============================-->
<div class="blog-area space-top space-extra-bottom">
  <div class="container page-layout right-sidebar">
    <div class="row gx-40 blog-page-with-sidebar">
      <div class="col-xxl-8 col-lg-7">
        <div class="row gy-4 all-posts-wrapper" id="blog-container">
        </div>
      </div>
      <div class="col-xxl-4 col-lg-5 sidebar-widget-area">
        <aside class="sidebar-sticky-area sidebar-area custom-bolg-latest-post">
          <div class="widget">
            <h3 class="widget_title">Latest Posts</h3>
            <div class="recent-post-wrap">
              <?php       
                    if(isset($blog)){
                      foreach ($blog as $item)
                      {  
                      $formattedDate = '';
                      $dateString = $item['blog_date'];
                      $date = new DateTime($dateString);
                      $formattedDate = $date->format('d M Y');
              ?>
              <div class="recent-post">
                <div class="media-img">
                  <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $item['slug']; ?>"><img src="<?php echo $item['image_medium']; ?>" alt="<?php echo $item['image_alt']; ?>"></a>
                </div>
                <div class="media-body">
                  <div class="recent-post-meta">
                    <a href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $item['slug']; ?>"><i class="far fa-clock"></i> <?php echo $formattedDate; ?></a>
                  </div>
                  <h4 class="post-title"><a class="text-inherit" href="<?php echo base_url('blog-details'); ?>?slug=<?php echo $item['slug']; ?>"><?php echo $item['title']; ?></a></h4>
                </div>
              </div>
              <?php } } ?>
            </div>
          </div>
        </aside>
        <div id="blog-container-2" class="mt-4">
        </div>
      </div>
      <div class="col-xxl-12">
        <div class="pagination"><ul></ul></div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  var blogContainer = $('#blog-container');
  var blogContainer2 = $('#blog-container-2');
  var paginationContainer = $('.pagination ul');
  var blogsPerPage = 10; // Number of blogs per page
  var currentPage = 1; // Current page number (1-based)

  // Initial load of blogs
  loadBlogs(1); // Start loading from the first blog

  function loadBlogs(startIndex) {
    $.ajax({
      type: 'GET',
      url: "<?php echo base_url('Console/get_blog_list'); ?>",
      dataType: 'json',
      data: {
        'length': blogsPerPage,
        'start': startIndex
      },
      success: function(response) {
        if (response.status && response.data) {
          var blogs = response.data;
          blogContainer.empty();
          blogContainer2.empty();

          blogs.forEach(function(blog, index) {
            var blogPostHtml;
            var blogPostHtml2;
            if (index === 0) {
              blogPostHtml = `
                  <div class="col-12 single-post-item">
                    <article class="post-single blog-card">
                      <div class="post-img blog-img">
                        <img src="${blog.image_large}" alt="${blog.image_alt}">
                      </div>
                      <div class="post-contents with-thum-img blog-content">
                        <div class="post-meta-item blog-meta">
                          <a >${blog.author.toUpperCase()}</a>
                          <a >${DateFormate(blog.blog_date)}</a>
                          <a >${blog.categories}</a>
                        </div>
                        <h3 class="post-title blog-title"><a href="<?php echo base_url('blog-details'); ?>?slug=${blog.slug}">${blog.title}</a></h3>
                        <div class="post-content blog-text">
                          <p>${blog.content} ...</p>
                        </div>
                        <div class="post-button">
                          <a href="<?php echo base_url('blog-details'); ?>?slug=${blog.slug}" class="link-btn style2">Continue Reading <i class="fas fa-arrow-right"></i></a>
                        </div>
                      </div>
                    </article>
                  </div>`;
            } else {
              if (index % 2 === 1) {
                blogPostHtml = `
                  <div class="col-12 single-post-item">
                    <article class="post-single blog-card style2">
                      <div class="post-img blog-img">
                        <img src="${blog.image_medium}" alt="${blog.image_alt}">
                      </div>
                      <div class="post-contents with-thum-img blog-content">
                        <div class="post-meta-item blog-meta">
                          <a >${blog.author.toUpperCase()}</a>
                          <a >${DateFormate(blog.blog_date)}</a>
                          <a >${blog.categories}</a>
                        </div>
                        <h3 class="post-title blog-title"><a href="<?php echo base_url('blog-details'); ?>?slug=${blog.slug}">${blog.title}</a></h3>
                        <div class="post-content blog-text">
                          <p>${blog.content} ...</p>
                        </div>
                        <div class="post-button">
                          <a href="<?php echo base_url('blog-details'); ?>?slug=${blog.slug}" class="link-btn style2">Continue Reading <i class="fas fa-arrow-right"></i></a>
                        </div>
                      </div>
                    </article>
                  </div>`;
              }else{
                blogPostHtml2 = `
                <div class="col-12 single-post-item">
                  <div class="blog-area mb-4">
                    <div class="blog-grid style2 style-big title-anim">
                      <div class="blog-img">
                        <img src="${blog.image_medium}" alt="${blog.image_alt}">
                      </div>
                      <div class="blog-content">
                        <div class="post-meta-item blog-meta">
                          <a >${blog.author.toUpperCase()}</a>
                          <a >${DateFormate(blog.blog_date)}</a>
                          <a >${blog.categories}</a>
                        </div>
                        <h3 class="blog-title"><a href="<?php echo base_url('blog-details'); ?>?slug=${blog.slug}">${blog.title}</a></h3>
                        <a href="<?php echo base_url('blog-details'); ?>?slug=${blog.slug}" class="link-btn style2">Continue Reading <i class="fas fa-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>`;
              }
            }

            blogContainer.append(blogPostHtml);
            blogContainer2.append(blogPostHtml2);
          });

          // Update pagination links
          updatePagination(response.total);

        } else {
          $('#blog-container').html('<p>No blogs found.</p>');
          paginationContainer.empty(); // Clear pagination if no blogs found
        }
      },
      error: function(xhr, status, error) {
        console.error('AJAX Error: ' + status + error);
        $('#blog-container').html('<p>Error loading blogs.</p>');
        paginationContainer.empty(); // Clear pagination on error
      }
    });
  }

  function updatePagination(totalBlogs) {
    paginationContainer.empty();
    var totalPages = Math.ceil(totalBlogs / blogsPerPage);

    // Previous page link
    if (currentPage > 1) {
      paginationContainer.append(`<li><a href="#" data-page="${currentPage - 1}">Previous</a></li>`);
    }

    // Page number links
    for (var i = 1; i <= totalPages; i++) {
      if (i === currentPage) {
        paginationContainer.append(`<li><a class="active" href="#">${i}</a></li>`);
      } else {
        paginationContainer.append(`<li><a href="#" data-page="${i}">${i}</a></li>`);
      }
    }

    // Next page link
    if (currentPage < totalPages) {
      paginationContainer.append(`<li><a href="#" data-page="${currentPage + 1}">Next</a></li>`);
    }

    // Pagination click handler
    paginationContainer.find('a').on('click', function(e) {
      e.preventDefault();
      var page = parseInt($(this).data('page'));
      currentPage = page;
      var startIndex = page; // Calculate startIndex correctly
      loadBlogs(currentPage);
      $('html, body').animate({ scrollTop: 0 }, 'fast');
    });
  }

  function DateFormate(text) {
    var parts = text.split("-");
    var year = parts[0];
    var month = parts[1];
    var day = parts[2];

    var monthNames = [
      "JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE",
      "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"
    ];

    var monthName = monthNames[parseInt(month, 10) - 1];
    var formattedDate = monthName + " " + day + ", " + year;
    return formattedDate;
  }
});
</script>