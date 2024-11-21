<?php
$money = $_GET['money'];

include_once './../../../backend/controllers/controller.php';
session_start();
$controller = new Controller();
spl_autoload_register(function ($class_name) {
    include './../../../backend/classes/' . $class_name . '.php';
});

$controller->UsuarioAdicionarDinheiro($money);

header('Location: '. BASE_URL. '/index.php');
?> 