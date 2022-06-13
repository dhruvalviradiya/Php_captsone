<?php require __DIR__ . '/inc/header.php'; ?>
<div class="container">
    <div class="section-block">

        <!-- service: Start   -->
        <div class="service-block service-detail-page">
            <!-- service title -->
            <div class="service-title">
                <h2><?= esc($service['title']) ?></h2>
                <hr>
            </div>
            <!-- service detail -->
            <div>
                <!-- service image -->
                <div class="service-img-block">
                    <img src="/images/service/<?= esc($service['image']) ?>" alt="<?= esc($service['title']) ?>" width="300" height="300">
                </div>
                <!-- detail text -->
                <div class="service-detail">
                    <div>
                        <?= html($service['description']) ?>
                    </div>
                    <p class="highlight-text">
                        <strong>Category : </strong> <?= esc($service['category_title']) ?>
                    </p>

                    <p class="highlight-text">
                        <strong>Price : </strong>$<?= number_format($service['price'], 2) ?>
                    </p>
                    <p class="highlight-text">
                        <strong>Estimated Time(in hours) : </strong> <?= esc($service['estimated_time']) ?>
                    </p>
                    <p class="highlight-text">
                        <strong>No of staff required : </strong> <?= esc($service['no_of_staff_required']) ?>
                    </p>

                    <p id="updated-time">
                        <i>Last Modified at <?= date('M d, Y ', strtotime($service['updated_at'])) ?></i>
                    </p>

                    <div class="btn-wrapper">
                        <form method="post" action="/?p=handle-cart">
                            <input type="hidden" name="csrf_token" value="<?= csrf() ?>" />
                            <input type="hidden" name="id" value="<?= esc_attr($service['id']) ?>" />
                            <input type="submit" value="Add to Cart" />
                        </form>
                    </div>
                </div>



            </div>
        </div>
        <!-- service: End   -->

    </div>
</div>
<?php require __DIR__ . '/inc/footer.php'; ?>