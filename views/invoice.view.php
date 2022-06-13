<?php require __DIR__ . '/inc/header.php'; ?>

<!-- Services -->
<div class="container">
    <div class="section-block">
        <?php if ($title) : ?>
            <h3>
                <?= esc($title) ?> You can print receipt for your reference.
            </h3>
        <?php endif; ?>
        <div class="invoice-block">
            <div>
                <h2 class="text-center">Invoice</h2>
                <div class="text-left company-info">
                    <p><strong>Unique Home Staging and Decor</strong></p>
                    <p>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        Portage Ave, Winnipeg, Manitoba
                    </p>
                    <p>
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        support@dhruvalviradiya.com
                    </p>
                    <p>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        (204)-123-4567
                    </p>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>
                                User Information
                            </th>
                            <th>
                                Order Information
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="v-align-top w-half">
                                <p> <?= esc($user['first_name']) . ' ' . esc($user['last_name']) ?></p>
                                <p>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <?= esc($user['phone']) ?>
                                </p>
                                <p>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <?= esc($user['email']) ?>
                                </p>
                                <p>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <?= esc($order['address'] ?? '') ?>
                                </p>
                            </td>
                            <td class="v-align-top w-half">
                                <p>
                                    <strong> Order Number:</strong> <?= date('Y', strtotime($order['created_at'])) . '-' . esc($order['id']) ?>
                                <p>
                                    <strong> Date:</strong> <?= date('M d, Y', strtotime($order['created_at'])) ?>
                                </p>
                                <p>
                                    <strong> Credit Card:</strong> ************<?= $order['credit_card_info'] ?>
                                </p>
                                <p>
                                    <strong> Auth Code:</strong> <?= $order['auth'] ?>
                                </p>
                                <p>
                                    <strong> Charged to Card:</strong> $ <?= number_format($order['total'], 2) ?>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <thead>
                        <tr>
                            <th>
                                Image
                            </th>
                            <th>
                                Service
                            </th>
                            <th>
                                Price
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($order_services as $key => $item) : ?>

                            <tr>
                                <td class="text-center">
                                    <img src="images/service/<?= esc($item['image'] ?? '') ?>" alt="<?= esc($item['title']) ?>" width="80" height="80">
                                </td>
                                <td>
                                    <?= esc($item['title']) ?>
                                </td>
                                <td class="text-right">
                                    $<?= number_format($item['price'], 2) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Sub Total</td>
                            <td class="text-right">$<?= number_format($order['sub_total'], 2) ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">GST</td>
                            <td class="text-right">$<?= number_format($order['gst'], 2) ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">PST</td>
                            <td class="text-right">$<?= number_format($order['pst'], 2) ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Total</strong></td>
                            <td class="text-right"><strong>$<?= number_format($order['total'], 2) ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>


        </div>
    </div>
</div>
<?php require __DIR__ . '/inc/footer.php'; ?>