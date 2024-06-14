<!--==============================
    Breadcumb
    ============================== -->
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcrumb-bg.png">
  <!-- bg animated image/ -->
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-md-8">
        <div class="breadcumb-content">
          <h1 class="breadcumb-title">Company Policies</h1>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="breadcumb-menu text-md-end">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li class="active">Company Policies</li>
        </ul>
      </div>
    </div>

  </div>
</div>

<div class="cta-area-2 space title-anim">
  <div class="container">
    <div class="row gy-4 align-items-center">
      <div class="col-lg-12">
        <table class="woocommerce-table custom-table">
          <tbody>
          <?php if (isset($policy)) {
            foreach ($policy as $index => $item) { ?>
            <tr>
              <th><?php echo $item['document_name']; ?></th>
              <td><a target="_blank" href="<?php echo $item['pdf']; ?>">Click to
                  View</a></td>
            </tr>
            <?php } } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>