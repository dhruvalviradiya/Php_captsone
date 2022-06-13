<?php require __DIR__ . '/../inc/admin_header.php'; ?>
<div class="container">

    <div class="card shadow-sm">
        <div class="card-header">
            <h1 class="pull-left"><?= esc($title) ?></h1>
            <div class="pull-right d-flex  mt-2">
                <!-- <a class="btn btn-success mx-2" href="#" aria-label="add">
                    <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
                    Add Users
                </a> -->
                <!-- <form action="/admin/" method="get" autocomplete="off" novalidate class="d-flex">
                    <input type="hidden" name="p" value="users" />
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
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Registered Date</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($users) == 0) : ?>
                        <tr>
                            <td class="text-center">
                                There no data available
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($users as $key => $user) : ?>
                        <tr>
                            <td>
                                <?= esc($key) + 1 ?>
                            </td>
                            <td> <?= esc($user['first_name']) ?> <?= esc($user['last_name']) ?>
                            </td>
                            <td>
                                <p><i class="fa fa-envelope"></i> &nbsp;<?= esc($user['email']) ?></small></p>
                                <p><i class="fa fa-phone"></i> &nbsp;<?= esc($user['phone']) ?></small></p>
                            </td>
                            <td>
                                <small>
                                    <?= formatAddress(esc($user['street'] ?? ''), esc($user['city'] ?? ''), esc($user['province'] ?? ''), esc($user['postal_code'] ?? ''), esc($user['country'] ?? '')) ?>
                                </small>
                            </td>
                            <td>
                                <small>
                                    <?= date('M d, Y ', strtotime($user['created_at'])) ?>
                                </small>
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
</div>
<?php require __DIR__ . '/../inc/admin_footer.php'; ?>