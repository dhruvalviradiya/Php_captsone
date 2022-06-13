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
        <!-- table start -->
        <?php if (count($orders) == 0) : ?>
            <div class="text-center">
                <h3>No purchase history.</h3>
            </div>
        <?php else : ?>
            <table>
                <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>Order No.</th>
                        <th>Sub Total</th>
                        <th>GST</th>
                        <th>PST</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($orders as $key => $order) : ?>
                        <tr>
                            <td>
                                <?= date('M d, Y', strtotime($order['created_at'])) ?>
                            </td>

                            <td>
                                <?= date('Y', strtotime($order['created_at'])) . '-' . esc($order['id']) ?>
                            </td>
                            <td>
                                $<?= number_format($order['sub_total'], 2)  ?>
                            </td>
                            <td>
                                $<?= number_format($order['gst'], 2)  ?>
                            </td>
                            <td>
                                $<?= number_format($order['pst'], 2)  ?>
                            </td>
                            <td>
                                $<?= number_format($order['total'], 2)  ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

    </div>
</div>


<?php require __DIR__ . '/inc/footer.php'; ?>