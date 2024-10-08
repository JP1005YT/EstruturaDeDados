<?php
    include_once './../../backend/controllers/controller.php';
    session_start();
    $controller = new Controller();
    spl_autoload_register(function ($class_name) {
        include './../../backend/classes/' . $class_name . '.php';
    });

    $newMoeda = $controller->ComprarItem($_GET['item'],$_SESSION['user']->getIdUser());
    $_SESSION['user']->setCoins($newMoeda);
?>