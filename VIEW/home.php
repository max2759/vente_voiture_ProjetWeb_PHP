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
        echo  $msg;
        unset($msg);
    }else{
        $msg = isset($_SESSION['successpwd']);
        echo  $msg;
        unset($msg);
    }
    ?>
</div>


