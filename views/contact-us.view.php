<?php require __DIR__ . '/inc/header.php'; ?>

<div class="container">
    <div class="section-block">
        <div class="section-heading-wrapper">
            <div class="section-heading">
                <!-- heading -->
                <h1><?= ucfirst(esc($title)) ?></h1>
            </div>
        </div>
        <form class="shadow custom-form" action="http://scott-media.com/test/form_display.php" method="post" autocomplete="on" novalidate>
            <input type="hidden" name="csrf_token" value="<?= csrf() ?>" />

            <fieldset>
                <p><b>Please fill out the information below:</b></p>
                <!-- input: first name -->
                <p>
                    <label for="first_name">First Name: </label>
                    <input type="text" name="first_name" id="first_name" maxlength="50" size="25" required />
                </p>

                <!-- input: last name -->
                <p>
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" maxlength="50" size="25" required="required" />
                </p>

                <!-- input: email address -->
                <p>
                    <label for="email_address">Email: </label>
                    <input type="email" name="email_address" id="email_address" size="25" required="required" />
                </p>

                <!-- input: phone number -->
                <p>
                    <label for="phone_number">Phone:</label>
                    <input type="text" id="phone_number" name="phone_number" minlength='9' maxlength="10" required="required" />
                </p>

                <!-- input: message -->
                <p><label for="message">Message:</label>
                    <textarea id="message" name="message" cols="35" rows="5" placeholder="Type your message here" required></textarea>
                </p>
                <p>
                    <input type="submit" value="Submit" /> &nbsp;
                    <input type="reset" value="Reset" /> &nbsp;
                </p>
            </fieldset>
        </form>
    </div>
</div>
<?php require __DIR__ . '/inc/footer.php'; ?>