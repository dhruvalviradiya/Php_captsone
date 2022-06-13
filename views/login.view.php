<?php require __DIR__ . '/inc/header.php'; ?>

<div class="container sign-up">
    <div class="section-block">
        <div class="section-heading-wrapper">
            <div class="section-heading">
                <!-- heading -->
                <h1><?= ucfirst(esc($title)) ?></h1>
            </div>
        </div>
        <form class="shadow custom-form" action="/?p=process-login" method="post" novalidate>
            <input type="hidden" name="csrf_token" value="<?= csrf() ?>" />
            <fieldset>
                <p><b>Please fill out the information below:</b></p>
                <p>
                    <label for="email">Email<span class="require-mark">*</span></label>
                    <input type="text" name="email" id="email" value="<?= esc_attr($post['email'] ?? '') ?>" />
                    <span class="error"> <?= esc($errors['email'][0] ?? '') ?> </span>
                </p>
                <p>
                    <label for="password">Password<span class="require-mark">*</span></label>
                    <input type="password" name="password" id="password" value="<?= esc_attr($post['password'] ?? '') ?>" />
                    <span class="error"> <?= esc($errors['password'][0] ?? '') ?> </span>
                </p>
                <p><button type="submit">Submit</button></p>
            </fieldset>
        </form>
    </div>
</div>

<?php require __DIR__ . '/inc/footer.php'; ?>