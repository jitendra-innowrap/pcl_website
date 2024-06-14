<!--==============================
    Breadcumb
    ============================== -->
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcrumb-bg.png">
  <!-- bg animated image/ -->
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-md-8">
        <div class="breadcumb-content">
          <h1 class="breadcumb-title">Disclosures under Regulation 46 of the LODR</h1>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="breadcumb-menu text-md-end">
          <li><a href="index.html">Home</a></li>
          <li class="active">Disclosures under Regulation 46 of the LODR</li>
        </ul>
      </div>
    </div>

  </div>
</div>

<div class="cta-area-2 space title-anim">
  <div class="container">
    <div class="row gy-4 align-items-center">
      <div class="col-lg-12">
        <div class="accordion-area accordion custom-accodin" style="padding:0px;border:none;" id="faqAccordion">
          <?php if (!empty($documents['blank'])): ?>
            <?php foreach ($documents['blank'] as $item): ?>
              <div class="policy-contaner">
                <p><?php echo $item['document_name']; ?><a target="_blank"
                    href="<?php echo $item['pdf']; ?>">Click to
                    View</a></p>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
          <?php $i = 0; if (!empty($documents['categories'])): ?>
            <?php foreach ($documents['categories'] as $subCategoryName => $subCategories): $i++; ?>
          <div class="accordion-card <?php echo ($i == 1) ? 'active' : ''; ?>">
            <div class="accordion-header" id="collapse-item-<?php echo $i; ?>">
              <button class="accordion-button <?php echo ($i == 1) ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapse-<?php echo $i; ?>" aria-expanded="<?php echo ($i == 1) ? 'true' : 'false'; ?>" aria-controls="collapse-<?php echo $i; ?>"><?php echo $subCategoryName; ?></button>
            </div>
            <div id="collapse-<?php echo $i; ?>" class="accordion-collapse collapse <?php echo ($i == 1) ? 'show' : ''; ?>" aria-labelledby="collapse-item<?php echo $i; ?>"
              data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                <?php foreach ($subCategories as $subCategory2Name => $items): ?>
                  <?php if (!empty($subCategory2Name)): ?>
                    <div class="policy-contaner-sub">
                      <p><?php echo $subCategory2Name; ?></p>
                    </div>
                  <?php endif; ?>
                  <table class="woocommerce-table custom-table-2 mb-3">
                    <tbody>
                      <?php if (!empty($items['0']['label_title'])): ?>
                        <tr>
                          <th class="heading1"><?php echo $items['0']['label_title']; ?></th>
                          <th class="heading2"><?php echo $items['0']['link_title']; ?></th>
                        </tr>
                      <?php endif; ?>
                      <?php foreach ($items as $item): ?>
                        <tr>
                          <th><?php echo $item['document_name']; ?></th>
                          <td><a target="_blank" href="<?php echo $item['pdf']; ?>">Click to View</a></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>