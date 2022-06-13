<?php
$notification = $_SESSION['toast'] ?? [];
unset($_SESSION['toast']);
?>

<?php if (!empty($notification['msg'])) : ?>
    <div class="notification <?= $notification['type'] ?? '' ?>">
        <?= esc($notification['msg']) ?>
    </div>
<?php endif; ?>