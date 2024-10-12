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
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset='utf-8'> 
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> DataStruct School | Perfil</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="shortcut icon" href="../../logo.png" />
    <script>let items = [];let itemsEquipped = [];</script>
</head>
    <body>
        <?php
            PageController::Cabecalho();
        ?>
        <?php
            $itemsPossuidos = $controller->GetItemsOfUsuariosById($_SESSION['user']->getIdUser());
            $items = $controller->ItemPush();
            while ($row = $itemsPossuidos->fetch_assoc()) {
                $items->data_seek(0); // Reset the pointer to the start of the result set
                while($item = $items->fetch_assoc()){
                    if($row['item_iditem'] == $item['iditem']){
                        if($row['ativo_item'] == 1){
                            echo "<script>
                                itemsEquipped.push(" . json_encode($row) . ");
                            </script>";
                        }
                        echo "<script>
                            items.push(" . json_encode($item) . ");
                        </script>";
                    }
                }
            }
        ?>
            <main>
                <section class="card">
                    <img src="./../../logo.png" width="35px" class="card-logo">
                    <h1><?php echo $_SESSION['user']->getUsername(); ?></h1>
                    <h2><?php echo $_SESSION['user']->getName(); ?></h2>
                    <span class="card-id"><?php

                    $val = str_pad($_SESSION['user']->getIdUser(), 9, '0', STR_PAD_LEFT);
                     
                    echo $val
                     ?></span>
                     <button class="edit-profile-btn" onclick="switchPages('./../EditarPerfil/editPerfil.php')">Editar Perfil</button>
                </section>
                <section class="character">
                    <button class="edit-profile-btn" onclick="switchPages('./../MinhasRoupas/')">Troca de roupa</button>
                <div class="corpos">
                    <img class="base" src="./../../src/sprites/torsos/corpodefalt.png">
                </div>
                <div class="calcas">
                    <img class="base" src="./../../src/sprites/calcas/calcadefalt.png">
                </div>
                <div class="cabelos">
                    
                </div>
                <div class="rostos">
                    <img class="base" src="./../../src/sprites/rostos/rostodefalt.png">
                </div>
                </section>
            </main>
            <script>
                function switchPages(url){
                    window.location.href = url
                }
                let corpos = document.querySelector(".corpos")
                let calcas = document.querySelector(".calcas")
                let cabelos = document.querySelector(".cabelos")
                let rostos = document.querySelector(".rostos")
                items.forEach(item => {
                    const img = document.createElement("img")
                    itemsEquipped.forEach(itemEquipped =>{
                        if(itemEquipped.item_iditem == item.iditem){
                            img.classList.add("active")
                        }
                    })
                    img.setAttribute("id",item.iditem)
                    img.classList.add("item")
                    img.src = `./../../src/sprites/${item.categoria_item}/${item.src_item}`
                    switch(item.categoria_item){
                        case "corpos":
                            corpos.appendChild(img)
                            break
                        case "calcas":
                            calcas.appendChild(img)
                            break
                        case "cabelos":
                            cabelos.appendChild(img)
                            break
                        case "rostos":
                            rostos.appendChild(img)
                            break
                    }
                })
            </script>
            <?php
                PageController::Rodape();
            ?>
</body>
</html>