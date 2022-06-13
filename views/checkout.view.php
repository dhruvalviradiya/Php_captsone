<?php require __DIR__ . '/inc/header.php'; ?>

<div class="container">
    <div class="section-block">
        <div class="section-heading-wrapper">
            <div class="section-heading">
                <!-- heading -->
                <h1>Checkout</h1>
            </div>
        </div>
        <div class="cart-block">
            <div class="d-flex responsive-block border">
                <?php if (empty($cart)) : ?>
                    <p class="no-data-msg">
                        Cart is empty!
                    </p>
                <?php else : ?>
                    <div class="w-half p-15 border">
                        <h3>
                            Order Information
                        </h3>
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

                                <?php foreach ($cart as $key => $item) : ?>

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
                                    <td>$<?= number_format($sub_total, 2) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">GST</td>
                                    <td>$<?= number_format($gst, 2) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">PST</td>
                                    <td>$<?= number_format($pst, 2) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Total</strong></td>
                                    <td><strong>$<?= number_format($total, 2) ?></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="w-half p-15 border">
                        <?php if ($title) : ?>
                            <h3>
                                <?= esc($title) ?>
                            </h3>
                        <?php endif; ?>
                        <form class="shadow custom-form payment-form" action="/?p=handle-payment" method="post" novalidate>
                            <input type="hidden" name="csrf_token" value="<?= csrf() ?>" />

                            <fieldset>
                                <p><b>Please fill out the information below:</b></p>
                                <p>
                                    <label for="name">Name on Card<span class="require-mark">*</span></label>
                                    <input type="text" name="name" id="name" value="<?= esc_attr($post['name'] ?? '') ?>" />
                                    <span class="error"> <?= esc($errors['name'][0] ?? '') ?> </span>
                                </p>
                                <p>
                                    <label for="credit_card_number">Credit Card Number<span class="require-mark">*</span></label>
                                    <input type="text" name="credit_card_number" id="credit_card_number" value="<?= esc_attr($post['credit_card_number'] ?? '') ?>" />
                                    <span class="error"> <?= esc($errors['credit_card_number'][0] ?? '') ?> </span>
                                </p>
                                <p>
                                    <label>Expiry<span class="require-mark">*</span></label>
                                    <select name="expiry_month" id="expiry_month">
                                        <option value="" <?php if (isset($post['expiry_month']) && $post['expiry_month'] == '') : ?>selected<?php endif; ?>>Select Month</option>
                                        <?php for ($i = 1; $i <= 12; $i++) : ?>
                                            <option value="<?= $i ?>" <?php if (isset($post['expiry_month']) && $post['expiry_month'] == $i) : ?>selected<?php endif; ?>><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <select name="expiry_year" id="expiry_year">
                                        <option value="" <?php if (isset($post['expiry_year']) && $post['expiry_year'] == '') : ?>selected<?php endif; ?>>Select Month</option>

                                        <?php for ($i = date("Y"); $i < date("Y") + 7; $i++) : ?>
                                            <option value="<?= $i ?>" <?php if (isset($post['expiry_year']) && $post['expiry_year'] == $i) : ?>selected<?php endif; ?>><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <span class="error"> <?= esc($errors['expiry_month'][0] ?? '') ?> </span>
                                    <span class="error"> <?= esc($errors['expiry_year'][0] ?? '') ?> </span>
                                </p>
                                <p>
                                    <label for="cvv">CVV<span class="require-mark">*</span></label>
                                    <input type="text" name="cvv" id="cvv" value="<?= esc_attr($post['cvv'] ?? '') ?>" />
                                    <span class="error"> <?= esc($errors['cvv'][0] ?? '') ?> </span>
                                </p>
                                <p>
                                    <input type="submit" value="Submit" />
                                </p>
                            </fieldset>
                        </form>
                    </div>
                <?php endif; ?>
            </div>


        </div>
    </div>
</div>
<?php require __DIR__ . '/inc/footer.php'; ?>