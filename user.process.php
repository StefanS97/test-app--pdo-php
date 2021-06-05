<?php

include("./includes/class-autoload.inc.php");

session_start();

$user = new User();


if (isset($_POST["register"])) {
    $username = $_POST["registerUsername"];
    $email = $_POST["registerEmail"];
    $password1 = $_POST["registerPassword1"];
    $password2 = $_POST["registerPassword2"];
    $admin = 0;

    if ($_POST["admin"] === "on") {
        $admin = 1;
    }

    if ($password1 === $password2) {
        $user->registerUser($username, $email, $password1, $admin);
        header("Location: login.php");
    }
} else if(isset($_POST["login"])) {
    $username = $_POST["loginUsername"];
    $password = $_POST["loginPassword"];

    if($user->getUser($username, $password)) {
        $_SESSION["username"] = $username;
        header("Location: index.php");
    }
} else if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: index.php");
}