<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$pseudoEdit = htmlspecialchars($_POST['pseudoEdit']);
$nomEdit = htmlspecialchars($_POST['nomEdit']);
$prenomEdit = htmlspecialchars($_POST['prenomEdit']);
$newPassEdit = htmlspecialchars($_POST['newPassEdit']);
$newPassEdit2 = htmlspecialchars($_POST['newPass2Edit']);
$employee_id = htmlspecialchars($_POST['employee_id']);
$nomRegEx = "#^[A-Z]+(([',. -][A-Za-zÀ-ÿ])?[A-Za-zÀ-ÿ]*)*$#";
$users = model::load("users");

if (isset($nomEdit) && isset($prenomEdit) && isset($pseudoEdit) && !empty($nomEdit) && !empty($prenomEdit) && !empty($pseudoEdit)) {
    if (preg_match($nomRegEx, $nomEdit)) {
        if (preg_match($nomRegEx, $prenomEdit)) {
            if (!empty($newPassEdit) && !empty($newPassEdit2)) {
                if (strlen($newPassEdit) >= 4 && strlen($newPassEdit2) >= 4) {
                    if ($newPassEdit == $newPassEdit2) {
                        $passHash = password_hash($newPassEdit, PASSWORD_DEFAULT);
                        $users->updateUserAndPassword($nomEdit, $prenomEdit, $passHash, $employee_id);
                        session_start();
                        header("Location: ../CONTROL/employees.php");
                        $_SESSION['successAddEmployee'] = "Modifications effectuées";
                        exit();
                    } else {
                        session_start();
                        $_SESSION['errors'] = "Les mots de passe ne correspondent pas";
                        header("Location: ../CONTROL/employees.php");
                        exit();
                    }
                } else {
                    session_start();
                    $_SESSION['errors'] = "Les mots de passes doivent comporter au moins 4 caractères";
                    header("Location: ../CONTROL/employees.php");
                    exit();
                }
            } else {
                $users->updateUser($nomEdit, $prenomEdit, $employee_id);
                session_start();
                $_SESSION['success'] = "Modifications effectuées";
                header("Location: ../CONTROL/employees.php");
                exit();
            }
        }else{
            session_start();
            $_SESSION['errors'] = "Le prénom doit commencer par une majuscule";
            header("Location: ../CONTROL/employees.php");
            exit();
        }
    }else{
        session_start();
        $_SESSION['errors'] = "Le nom doit commencer par une majuscule";
        header("Location: ../CONTROL/employees.php");
        exit();
    }
}


