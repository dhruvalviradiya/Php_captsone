<?php require __DIR__ . '/inc/header.php'; ?>

<div class="container">
    <div class="section-block">
        <div class="section-heading-wrapper">
            <div class="section-heading">
                <!-- heading -->
                <h1><?= esc($heading) ?></h1>
            </div>
        </div>
        <!-- content -->
        <p>
            Home staging and decorating (or interior redesign as it’s also called) are very similar. Both services are
            concerned with creating a visually appealing home. You are either “decorating to sell” or “decorating to
            live.”
        </p>
        <p>Our decorating or redesign recommendations are driven by what’s needed to make the home most appealing and
            comfortable for the people living there. Our goal is to create that ideal environment that is their refuge
            from the outside world, and/or their place to entertain. Depending on what they’re looking for.</p>
    </div>

    <!-- our service block -->
    <div class="section-block">
        <!-- Heading for services-->
        <div class="section-heading-wrapper">
            <div class="section-heading">
                <h2>Our Services</h2>
            </div>
        </div>

        <div class="services-wrapper">
            <!-- Service box wrapper-->
            <?php foreach ($categories as $category) : ?>

                <div class="service-box shadow">
                    <a href="/?p=services&category=<?= esc($category['id']) ?>">
                        <img src="images/category/<?= esc($category['image']) ?>" alt=" <?= esc($category['title']) ?> " width=" 250" height="200">
                        <p class="service-title"><?= esc($category['title']) ?></p>
                    </a>
                </div>
            <?php endforeach; ?>

        </div>

    </div>

</div>

<?php require __DIR__ . '/inc/footer.php'; ?>