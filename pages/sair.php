<?php
    require_once __DIR__. "/../backend/controllers/controller.php";

    $controller = new Controller();

    echo $controller->UserLogout();
?>