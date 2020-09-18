<?php
require 'config.php';
require 'models/Auth.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$birthdate = filter_input(INPUT_POST, 'birthdate');

if($email && $password && $name && $birthdate) {

    $auth = new Auth($pdo, $base);

    if($auth->emailExists($email) === false) {

        $auth->registerUser($name, $email, $password, $birthdate);
        header("Location: ".$base);
        exit;

    } else {
        $_SESSION['flash'] = 'Este email já esta cadastrado!';
        header("Location: ".$base."/signup.php");
        exit;
    }

}

$_SESSION['flash'] = 'Compos não enviado(s)!';
header("Location: ".$base."/signup.php");
exit;