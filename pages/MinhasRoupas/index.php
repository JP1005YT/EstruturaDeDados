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
    <title> DataStruct School | Minhas Roupas</title>
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
<section class="opcs">
    <h1>Minhas Roupas</h1>
    <button>Salvar</button>
</section>
<main>
    <section>
        <div class="head">
            <button>
                <i class='bx bxs-chevrons-left'></i>
            </button>
            <button>
                <i class='bx bxs-chevrons-left'></i>
            </button>
        </div>
        <button>
            <i class='bx bxs-chevrons-left'></i>
        </button>
        <button>
            <i class='bx bxs-chevrons-left'></i>
        </button>
    </section>
    <div class="character">
        <?php
        echo "<h1>".$_SESSION['user']->getUsername()."</h1>";
        ?>
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
    </div>
    <section>
        <div class="head">
            <button>
                <i class='bx bxs-chevrons-right'></i>
            </button>
            <button>
                <i class='bx bxs-chevrons-right'></i>
            </button>
        </div>
        <button>
            <i class='bx bxs-chevrons-right'></i>
        </button>
        <button>
            <i class='bx bxs-chevrons-right'></i>
        </button>
    </section>
    <script>
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
</main>
</body>