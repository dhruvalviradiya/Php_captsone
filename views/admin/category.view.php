<?php require __DIR__ . '/../inc/admin_header.php'; ?>
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header">
            <h1 class="pull-left"><?= esc($title) ?></h1>
            <div class="pull-right d-flex mt-2">
                <!-- <a class="btn btn-success mx-2" href="#" aria-label="add">
                    <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
                    Add Category
                </a> -->
                <!-- <form action="/admin/" method="get" autocomplete="off" novalidate class="d-flex">
                    <input type="hidden" name="p" value="category" />
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" maxlength="255">&nbsp;
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->

                <div class="clearfix"></div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Title</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($categories) == 0) : ?>
                        <tr>
                            <td class="text-center">
                                There no data available
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($categories as $key => $category) : ?>
                        <tr>
                            <td>
                                <?= esc($key) + 1 ?>
                            </td>
                            <td>
                                <p>
                                    <img src="/images/category/<?= esc($category['image']) ?>" alt="<?= esc($category['title']) ?>" width="50" height="50">
                                </p>
                            </td>
                            <td>
                                <small><?= esc($category['title']) ?></small>
                            </td>
                            <!-- <td>
                                <a class="btn btn-primary" href="#" aria-label="Edit">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-danger" href="#" aria-label="Delete">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require __DIR__ . '/../inc/admin_footer.php'; ?>