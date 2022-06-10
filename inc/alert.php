<?php

if(isset($_SESSION['CUSTOMER_ALERT'])) {
    $alert = json_decode($_SESSION['CUSTOMER_ALERT'], true);
    extract($alert);
    ?>
        <script>
            swal("<?= $message ?>", "", "<?= $status ?>")
        </script>
    <?php
}

unset($_SESSION['CUSTOMER_ALERT']);
?>