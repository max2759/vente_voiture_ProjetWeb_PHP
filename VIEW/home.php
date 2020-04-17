<div class="container">

    <?php
    /*
     * Message d'erreur si modification de mot de passe de l'utilisateur pas bien fait
     * */
    if (isset($_SESSION['errorpwd'])) {
        $msg = $_SESSION['errorpwd'];
        echo '<div class="alert alert-danger">' . $msg . '</div>';
        unset($_SESSION['errorpwd']);
    }
    /*
    * Message pour avertir que le mot de passse a bien été modifié
    */
    if (isset($_SESSION['successpwd'])) {
        $msgSuccess = $_SESSION['successpwd'];
        echo '<div class="alert alert-success">' . $msgSuccess . '</div>';
        unset($_SESSION['successpwd']);
    }
    ?>
</div>


