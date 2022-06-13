<?php require __DIR__ . '/inc/header.php'; ?>

<!-- Services -->
<div class="container">
    <div class="section-block">
        <?php if ($title) : ?>
            <h3>
                <?= esc($title) ?>
            </h3>
        <?php endif; ?>
        <div class="search-service">
            <form action="/" method="get" autocomplete="off" novalidate>
                <input type="hidden" name="p" value="services" />
                <input id="search" type="text" name="search" placeholder="search" maxlength="255" />&nbsp;
                <input type="submit" value="search" />
            </form>
        </div>
        <div class="clear-fix"></div>

        <div class="service-filter">

            <h3><i class="fa fa-filter" aria-hidden="true"></i> &nbsp; Category</h3>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li>
                        <a href="/?p=services&category=<?= esc($category['id']) ?>">
                            <?= esc($category['title']) ?> (<?= $category['service_count'] ?>)
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="service-block-wrapper">
            <?php foreach ($services as $service) : ?>
                <!-- Service: Start   -->
                <div class="service-block">
                    <!-- service title -->
                    <div class="service-title">
                        <h2><?= esc($service['title']) ?></h2>
                        <hr>
                    </div>
                    <!-- service detail -->
                    <div>
                        <!-- service image -->
                        <div class="service-img-block">
                            <img src="images/service/<?= esc($service['image']) ?>" alt="<?= esc($service['title']) ?>" width="300" height="300">
                        </div>
                        <!-- detail text -->
                        <div class="service-detail">
                            <p class="highlight-text">
                                <strong>Category : </strong> <?= esc($service['category_title']) ?>
                            </p>
                            <p class="highlight-text">
                                <strong>Price : </strong> $<?= number_format($service['price'], 2) ?>
                            </p>
                            <p><?= esc($service['short_description']) ?>
                            </p>

                            <div class="btn-wrapper">
                                <a href="/?p=service-detail&service=<?= esc($service['id']) ?>">
                                    More Info
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Service: End   -->
            <?php endforeach; ?>

        </div>
        <div class="clear-fix"></div>


    </div>
</div>
<?php require __DIR__ . '/inc/footer.php'; ?>