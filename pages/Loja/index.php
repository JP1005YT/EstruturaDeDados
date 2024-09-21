<?php
    error_reporting(E_ERROR | E_PARSE);
    include_once './../../backend/classes/Usuario.php';
    include_once './../../backend/controllers/page_controller.php';
    include_once './../../backend/controllers/controller.php';
    session_start();
    $controller = new Controller();
    spl_autoload_register(function ($class_name) {
        include './../../backend/classes/' . $class_name . '.php';
    });
?>
<html lang="pt-BR">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> DataStruct School | Loja</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="shortcut icon" href="../../logo.png" />
</head>
<body>
    <?php PageController::Cabecalho(); ?>
    <main>
        <section class="items">
            <?php
                $user = $_SESSION['user'];

                $resp = $controller->ItemPush();

                $itemsdousuario = $controller->GetItemsOfUsuariosById($user->getIdUser());
                
                $paraowhile = $usuariohasitem = $itemsdousuario->fetch_assoc();

                while($row = $resp->fetch_assoc()){ 
                    foreach($itemsdousuario as $item){
                        if($item['item_iditem'] == $row['iditem']){
                            $usuariohasitem = true;
                        }else{
                            $usuariohasitem = false;
                        }
                    }
                    if($usuariohasitem){
                        echo '<div class="item disable">
                            <div class="img-container">
                                <img class="'.$row['categoria_item'].'"src="./../../src/sprites/'.$row['categoria_item'].'/'.$row['src_item'].'" alt="item">
                            </div>
                            <h3>'.$row['nome_item'].'</h3>
                            <h4>'.$row['categoria_item'].'</h4>
                            <div class="price">
                                <p class="money">
                                    <i class="bx bxs-user-check" ></i>
                                </p>
                            </div>
                        </div>';
                    }else{
                        echo '<div class="item">
                            <div class="img-container">
                                <img class="'.$row['categoria_item'].'"src="./../../src/sprites/'.$row['categoria_item'].'/'.$row['src_item'].'" alt="item">
                            </div>
                            <h3>'.$row['nome_item'].'</h3>
                            <h4>'.$row['categoria_item'].'</h4>
                            <div class="price">
                                <p class="money">
                                    <i class="bx bx-coin"></i>
                                    '.$row['valor_item'].'
                                </p>
                            </div>
                        </div>';
                    }
                }
            ?>
        </section>
        <section class="tabs">
                
        </section>
    </main>
    <script>
        let items = document.querySelectorAll(".item:not(.disable)")
        items.forEach(item => {
            item.addEventListener("mouseover", () => {
                item.querySelector(".price").classList.add("active")
            })
            item.addEventListener("mouseleave", () => {
                item.querySelector(".price").classList.remove("active")
            })
        })
    </script>
</body>
</html>