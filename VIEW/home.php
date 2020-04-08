<?php

if (!(isset($_SESSION['isUser']) || isset($_SESSION['isAdmin']))) {
    header('Location: ../CONTROL/connexion.php');
    exit();
}
?>
<div class="container">
    <?php
    if (isset($_SESSION['errorpwd'])) {
        $msg = $_SESSION['errorpwd'];
        echo '<div class="alert alert-danger">' . $msg . '</div>';
        unset($msg);
    }else{
        $msg = isset($_SESSION['successpwd']);
        echo '<div class="alert alert-success alertpwd">' . $msg . '</div>';
        unset($msg);
    }
    ?>
</div>


