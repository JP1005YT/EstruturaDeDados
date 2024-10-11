<?php
include "./../../backend/controllers/controller.php";

$controller = new Controller();

$userId = $_GET['userId'];
$itemAtivo = $_GET['itemAtivo'];
$itemDesativado = $_GET['itemDesativado'];

$controller->updateMinhasRoupas($userId, $itemAtivo, $itemDesativado);
?>