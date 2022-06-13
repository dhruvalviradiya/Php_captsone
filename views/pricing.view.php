<?php require __DIR__ . '/inc/header.php'; ?>

<!-- Pricing -->
<div class="container">
    <div class="section-block">
        <div class="section-heading-wrapper">
            <div class="section-heading">
                <!-- heading -->
                <h1><?= ucfirst(esc($title)) ?></h1>
            </div>
        </div>

        <!-- table start -->
        <table id="assignment_table">
            <!-- Caption of table -->
            <caption>Actual charges will be calculated based on Sq. ft and rent duration </caption>
            <tr>
                <!-- first row heading of service -->
                <th></th>
                <th>Single family (detached)</th>
                <th>Duplex and Triplex</th>
                <th>Townhouses</th>
                <th>Bungalow</th>
                <th>Cottage</th>
                <th>Commercial Space</th>
            </tr>

            <tr>
                <!-- second row : Occupied home staging service charges -->
                <th>Occupied Home Staging</th>
                <td> Starts from $600*</td>
                <td> Starts from $700*</td>
                <td> Starts from $800*</td>
                <td> Starts from $900*</td>
                <td> Starts from $1000*</td>
                <td>-</td>
            </tr>

            <tr>
                <!-- third row : Vacant home staging service charges -->
                <th>Vacant Home Staging</th>
                <td> Starts from $500*</td>
                <td> Starts from $600*</td>
                <td> Starts from $700*</td>
                <td> Starts from $800*</td>
                <td> Starts from $900*</td>
                <td>-</td>
            </tr>

            <tr>
                <!-- fourth row : Commercial space staging service charges -->
                <th>Commercial Space Staging</th>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td> Starts from $1000*</td>
            </tr>
        </table>
    </div>
</div>

<?php require __DIR__ . '/inc/footer.php'; ?>