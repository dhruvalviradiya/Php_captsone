<?php require __DIR__ . '/inc/header.php'; ?>

<!-- Services -->
<div class="container">
    <div class="section-block">
        <?php if ($title) : ?>
            <h3>
                <?= esc($title) ?>
            </h3>
        <?php endif; ?>
        <div class="cart-block">
            <div>

                <?php if (empty($cart)) : ?>
                    <p class="no-data-msg">
                        Cart is empty!
                    </p>
                <?php else : ?>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($cart as $key => $item) : ?>

                                <tr>
                                    <td class="text-center">
                                        <img src="images/service/<?= esc($item['image'] ?? '') ?>" alt="<?= esc($item['title']) ?>" width="80" height="80">
                                    </td>
                                    <td>
                                        <?= esc($item['title']) ?>
                                    </td>
                                    <td>
                                        $<?= number_format($item['price'], 2) ?>
                                    </td>
                                    <td>
                                        <div class="btn-wrapper">
                                            <form method="post" action="/?p=remove-cart">
                                                <input type="hidden" name="csrf_token" value="<?= csrf() ?>" />
                                                <input type="hidden" name="id" value="<?= esc_attr($item['id']) ?>" />
                                                <input type="hidden" name="type" value="remove" />
                                                <input type="submit" class="remove" value="Remove" />
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">Sub Total</td>
                                <td>$<?= number_format($sub_total, 2) ?></td>
                            </tr>
                            <tr>
                                <td colspan="3">GST</td>
                                <td>$<?= number_format($gst, 2) ?></td>
                            </tr>
                            <tr>
                                <td colspan="3">PST</td>
                                <td>$<?= number_format($pst, 2) ?></td>
                            </tr>
                            <tr>
                                <td colspan="3"><strong>Total</strong></td>
                                <td><strong>$<?= number_format($total, 2) ?></strong></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div class="btn-wrapper text-right">
                                        <form class="d-inline-block" method="post" action="/?p=remove-cart">
                                            <input type="hidden" name="csrf_token" value="<?= csrf() ?>" />
                                            <input type="hidden" name="type" value="clear" />
                                            <input type="submit" class="remove" value="Clear" />
                                        </form>

                                        <a href="/?p=checkout" class="success">Checkout</a>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                <?php endif; ?>
            </div>


        </div>
    </div>
</div>
<?php require __DIR__ . '/inc/footer.php'; ?>