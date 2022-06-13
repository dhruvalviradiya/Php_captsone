<?php require __DIR__ . '/inc/header.php'; ?>

<div class="container sign-up">
    <div class="section-block">
        <div class="section-heading-wrapper">
            <div class="section-heading">
                <!-- heading -->
                <h1><?= ucfirst(esc($title)) ?></h1>
            </div>
        </div>
        <form class="shadow custom-form" action="/?p=process-sign-up" method="post" novalidate>
            <input type="hidden" name="csrf_token" value="<?= csrf() ?>" />

            <fieldset>
                <p><b>Please fill out the information below:</b></p>
                <p>
                    <label for="first_name">First Name<span class="require-mark">*</span></label>
                    <input type="text" name="first_name" id="first_name" value="<?= esc_attr($post['first_name'] ?? '') ?>" />
                    <span class="error"> <?= esc($errors['first_name'][0] ?? '') ?> </span>
                </p>
                <p>
                    <label for="last_name">Last Name<span class="require-mark">*</span></label>
                    <input type="text" name="last_name" id="last_name" value="<?= esc_attr($post['last_name'] ?? '') ?>" />
                    <span class="error"> <?= esc($errors['last_name'][0] ?? '') ?> </span>
                </p>
                <p>
                    <label for="email">Email<span class="require-mark">*</span></label>
                    <input type="text" name="email" id="email" value="<?= esc_attr($post['email'] ?? '') ?>" />
                    <span class="error"> <?= esc($errors['email'][0] ?? '') ?> </span>
                </p>
                <p>
                    <label for="phone">Phone<span class="require-mark">*</span></label>
                    <input type="text" name="phone" id="phone" value="<?= esc_attr($post['phone'] ?? '') ?>" />
                    <span class="error"> <?= esc($errors['phone'][0] ?? '') ?> </span>
                </p>
                <p>
                    <label for="password">Password<span class="require-mark">*</span></label>
                    <input type="password" name="password" id="password" />
                    <span class="error"> <?= esc($errors['password'][0] ?? '') ?> </span>
                </p>
                <p>
                    <label for="confirm_password">Confirm Password<span class="require-mark">*</span></label>
                    <input type="password" name="confirm_password" id="confirm_password" />
                    <span class="error"> <?= esc($errors['confirm_password'][0] ?? '') ?> </span>
                </p>
                <p>
                    <label for="street">Street<span class="require-mark">*</span></label>
                    <input type="text" name="street" id="street" value="<?= esc_attr($post['street'] ?? '') ?>" />
                    <span class="error"> <?= esc($errors['street'][0] ?? '') ?> </span>
                </p>
                <p>
                    <label for="city">City<span class="require-mark">*</span></label>
                    <input type="text" name="city" id="city" value="<?= esc_attr($post['city'] ?? '') ?>" />
                    <span class="error"> <?= esc($errors['city'][0] ?? '') ?> </span>
                </p>
                <p>
                    <label for="postal_code">Postal Code<span class="require-mark">*</span></label>
                    <input type="text" name="postal_code" id="postal_code" value="<?= esc_attr($post['postal_code'] ?? '') ?>" />
                    <span class="error"> <?= esc($errors['postal_code'][0] ?? '') ?> </span>
                </p>
                <p>
                    <label for="province">Province<span class="require-mark">*</span></label>
                    <input type="text" name="province" id="province" value="<?= esc_attr($post['province'] ?? '') ?>" />
                    <span class="error"> <?= esc($errors['province'][0] ?? '') ?> </span>
                </p>
                <p>
                    <label for="country">Country<span class="require-mark">*</span></label>
                    <input type="text" name="country" id="country" value="<?= esc_attr($post['country'] ?? '') ?>" />
                    <span class="error"> <?= esc($errors['country'][0] ?? '') ?> </span>
                </p>
                <p class="news-letter-input-wrapper">
                    <!-- <input type="checkbox" name="subscribe_to_newsletter" value="subscribe_to_newsletter" /> -->
                    <input type="checkbox" name="subscribe_to_newsletter" id="subscribe_to_newsletter" <?= isset($post['subscribe_to_newsletter']) ? 'checked' : '' ?> value="<?= isset($post['subscribe_to_newsletter']) ? 1 : 0 ?>" />
                    <label class="news-letter-label" for="subscribe_to_newsletter">Do you want to subscribe for newsletter?</label>
                </p>
                <p><button type="submit">Submit</button></p>
            </fieldset>
        </form>
    </div>
</div>

<?php require __DIR__ . '/inc/footer.php'; ?>