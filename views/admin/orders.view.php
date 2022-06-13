<?php require __DIR__ . '/../inc/admin_header.php'; ?>
<div class="container">
    <div class="card p-2 shadow-sm">
        <div class="card-header">
            <h1><?= esc($title) ?></h1>

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Order No.</th>
                        <th>Order Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($orders) == 0) : ?>
                        <tr>
                            <td colspan="3" class="text-center">
                                There no data available
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($orders as $key => $order) : ?>
                        <tr>
                            <td>
                                <?= date('M d, Y', strtotime($order['created_at'])) ?>
                            </td>

                            <td>
                                <?= date('Y', strtotime($order['created_at'])) . '-' . esc($order['id']) ?>
                            </td>
                            <td>
                                $<?= number_format($order['total'], 2)  ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require __DIR__ . '/../inc/admin_footer.php'; ?>