<?php

require __DIR__ . '/inc/header.php';
?>

<div class="container">
  <div class="section-block">
    <div class="section-heading-wrapper">
      <div class="section-heading">
        <!-- heading -->
        <h1><?= ucwords(esc($title)) ?></h1>
      </div>
    </div>
    <div class="shadow user-info-block">
      <h2>Contact Details</h2>

      <?php if (!$result) : ?>
        <p style="color:#900;">
          Something went wrong! Please try again later or contact to admin for support.
        </p>
      <?php endif; ?>
      <div class="user-info-wrapper">
        <div class="user-info-item">
          <p>
            <?= esc($result['first_name'] ?? '') . ' ' . esc($result['last_name'] ?? '') ?>
          </p>
          <label>Name</label>
        </div>
        <div class="user-info-item">
          <p>
            <?= esc($result['email'] ?? '') ?>
          </p>
          <label>Email</label>
        </div>
        <div class="user-info-item">
          <p>
            <?= esc($result['phone'] ?? '') ?>
          </p>
          <label>Phone</label>
        </div>
        <div class="user-info-item">
          <p>
            <?= formatAddress(esc($result['street'] ?? ''), esc($result['city'] ?? ''), esc($result['province'] ?? ''), esc($result['postal_code'] ?? ''), esc($result['country'] ?? '')) ?>
          </p>
          <label>Address</label>
        </div>
      </div>
    </div>
  </div>
</div>


<?php require __DIR__ . '/inc/footer.php'; ?>