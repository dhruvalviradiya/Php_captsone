<?php require __DIR__ . '/../inc/admin_header.php'; ?>
<div class="container">
    <?php if (isset($msg) && $msg) : ?>
        <h3 class="pb-3">
            <?= esc($msg) ?>
        </h3>
    <?php endif; ?>
    <div class="card shadow-sm">
        <div class="card-header">
            <h1 class="pull-left"><?= esc($title) ?></h1>
            <div class="pull-right d-flex  mt-2">
                <a class="btn btn-success mx-2" href="/admin/?p=add-service" aria-label="add">
                    <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
                    Add Service
                </a>
                <form action="/admin/" method="get" autocomplete="off" novalidate class="d-flex">
                    <input type="hidden" name="p" value="services" />
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" maxlength="255">&nbsp;
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="card-body">

            <?php if (count($services) == 0) : ?>
                <div class="text-center">
                    There no data available
                </div>
                </tr>
            <?php else : ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($services as $key => $service) : ?>
                            <tr>
                                <td>
                                    <?= esc($key) + 1 ?>
                                </td>
                                <td>
                                    <p>
                                        <img src="/images/service/<?= esc($service['image']) ?>" alt="<?= esc($service['title']) ?>" width="50" height="50">
                                    </p>
                                </td>
                                <td>
                                    <small><?= esc($service['title']) ?></small>
                                </td>
                                <td>
                                    <small><?= esc($service['category_title']) ?></small>
                                </td>
                                <td class="text-end">
                                    <a class="btn btn-primary" href="/admin/?p=edit-service&id=<?= esc($service['id']) ?>" aria-label="Edit">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <form action="/admin/?p=delete-service" method="post" class="d-inline">
                                        <input type="hidden" name="csrf_token" value="<?= csrf() ?>" />
                                        <input type="hidden" name="id" value="<?= esc($service['id']) ?>" />
                                        <button class="btn btn-danger" onclick="return confirm('Do you really want to delete this item?')" type="submit">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
    <?php require __DIR__ . '/../inc/admin_footer.php'; ?>