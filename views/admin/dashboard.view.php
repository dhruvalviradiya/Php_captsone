<?php require __DIR__ . '/../inc/admin_header.php'; ?>
<div class="container">
    <h1><?= esc($title) ?></h1>
    <hr />

    <h2>Overview</h2>
    <div class="row mb-3">
        <div class="col-md-4 col-sm-6 p-2">
            <div class="card shadow">
                <div class="card-body text-center">
                    <p class="h3">
                        <?= esc($totalCategory['total'] ?? 0) ?>
                    </p>
                    <p>Total Category</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 p-2">
            <div class="card shadow">
                <div class="card-body text-center">
                    <p class="h3">
                        <?= esc($totalServices['total'] ?? 0) ?>
                    </p>
                    <p>Total Services</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 p-2">
            <div class="card shadow">
                <div class="card-body text-center">
                    <p class="h3">
                        <?= esc($totalUsers['total'] ?? 0) ?>
                    </p>
                    <p>Total Users</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 p-2">
            <div class="card shadow">
                <div class="card-body text-center">
                    <p class="h3">
                        <?= esc($totalOrder['total'] ?? 0) ?>
                    </p>
                    <p>Total Orders</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 p-2">
            <div class="card shadow">
                <div class="card-body text-center">
                    <p class="h3">
                        $<?= esc(number_format($avgOrderPrice['avg'] ?? 0), 2) ?>
                    </p>
                    <p>Average Order Price</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 p-2">
            <div class="card shadow">
                <div class="card-body text-center">
                    <p class="h3">
                        $<?= esc(number_format($maxOrderPrice['max'] ?? 0), 2) ?>
                    </p>
                    <p>Highest Order Price</p>
                </div>
            </div>
        </div>
    </div>

    <h2>Recent Log History</h2>
    <div class="card p-2 shadow-sm">
        <table class="table">
            <thead>
                <tr>
                    <th>Log Entry </th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($logs) == 0) : ?>
                    <tr>
                        <td class="text-center">
                            There no logs available.
                        </td>
                    </tr>
                <?php endif; ?>
                <?php foreach ($logs as $key => $log) : ?>
                    <tr>
                        <td>
                            <small><?= esc($log['event']) ?></small>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require __DIR__ . '/../inc/admin_footer.php'; ?>