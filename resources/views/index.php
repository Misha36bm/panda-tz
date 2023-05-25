<!DOCTYPE html>
<!-- TODO: remove theme  -->
<html lang="en" data-bs-theme="dark">

<?php require_once 'partials/head.php' ?>

<body>
    <?php require_once 'partials/nav.php' ?>

    <?php
    if (isset($slot)) {
        echo $slot;
    }
    ?>

    <?php require_once 'partials/scripts.php' ?>
</body>

</html>