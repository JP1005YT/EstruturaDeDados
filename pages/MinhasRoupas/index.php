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

    echo "<script> let UserID = ".json_encode($_SESSION['user']->getIdUser())."</script>";
?>
<section class="opcs">
    <h1>Minhas Roupas</h1>
    <button onclick="Salvar()">Salvar</button>
</section>
<main>
    <section>
        <div class="head">
            <button onclick="TrocarItem('cabelo',true)">
                <i class='bx bxs-chevrons-left'></i>
            </button>
            <button onclick="TrocarItem('rosto',true)">
                <i class='bx bxs-chevrons-left'></i>
            </button>
        </div>
        <button onclick="TrocarItem('corpo',true)">
            <i class='bx bxs-chevrons-left'></i>
        </button>
        <button onclick="TrocarItem('calcas',true)">
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
            <button onclick="TrocarItem('cabelo',false)">
                <i class='bx bxs-chevrons-right'></i>
            </button>
            <button onclick="TrocarItem('rosto',false)">
                <i class='bx bxs-chevrons-right'></i>
            </button>
        </div>
        <button onclick="TrocarItem('corpo',false)">
            <i class='bx bxs-chevrons-right'></i>
        </button>
        <button onclick="TrocarItem('calcas',false)">
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

        itemsAnteriores = document.querySelectorAll('.character .active')

        function TrocarItem(part, isFront) {
            switch (part) {
            case 'rosto':
                let allRostos = document.querySelectorAll(".rostos .item");
                let activeRosto = -1;
                allRostos.forEach((rosto, index) => {
                if (rosto.classList.contains("active")) {
                    activeRosto = index;
                }
                rosto.classList.remove("active");
                });
                if (activeRosto === -1) {
                allRostos[0].classList.add("active");
                } else if (isFront) {
                if (activeRosto == allRostos.length - 1) {
                    allRostos[0].classList.add("active");
                } else {
                    allRostos[activeRosto + 1].classList.add("active");
                }
                } else {
                if (activeRosto == 0) {
                    allRostos[allRostos.length - 1].classList.add("active");
                } else {
                    allRostos[activeRosto - 1].classList.add("active");
                }
                }
                break;
            case 'corpo':
                let allCorpos = document.querySelectorAll(".corpos .item");
                let activeCorpo = -1;
                allCorpos.forEach((corpo, index) => {
                if (corpo.classList.contains("active")) {
                    activeCorpo = index;
                }
                corpo.classList.remove("active");
                });
                if (activeCorpo === -1) {
                allCorpos[0].classList.add("active");
                } else if (isFront) {
                if (activeCorpo == allCorpos.length - 1) {
                    allCorpos[0].classList.add("active");
                } else {
                    allCorpos[activeCorpo + 1].classList.add("active");
                }
                } else {
                if (activeCorpo == 0) {
                    allCorpos[allCorpos.length - 1].classList.add("active");
                } else {
                    allCorpos[activeCorpo - 1].classList.add("active");
                }
                }
                break;
            case 'cabelo':
                let allCabelos = document.querySelectorAll(".cabelos .item");
                let activeCabelo = -1;
                allCabelos.forEach((cabelo, index) => {
                if (cabelo.classList.contains("active")) {
                    activeCabelo = index;
                }
                cabelo.classList.remove("active");
                });
                if (activeCabelo === -1) {
                allCabelos[0].classList.add("active");
                } else if (isFront) {
                if (activeCabelo == allCabelos.length - 1) {
                    allCabelos[0].classList.add("active");
                } else {
                    allCabelos[activeCabelo + 1].classList.add("active");
                }
                } else {
                if (activeCabelo == 0) {
                    allCabelos[allCabelos.length - 1].classList.add("active");
                } else {
                    allCabelos[activeCabelo - 1].classList.add("active");
                }
                }
                break;
            case 'calcas':
                let allCalcas = document.querySelectorAll(".calcas .item");
                let activeCalca = -1;
                allCalcas.forEach((calca, index) => {
                if (calca.classList.contains("active")) {
                    activeCalca = index;
                }
                calca.classList.remove("active");
                });
                if (activeCalca === -1) {
                allCalcas[0].classList.add("active");
                } else if (isFront) {
                if (activeCalca == allCalcas.length - 1) {
                    allCalcas[0].classList.add("active");
                } else {
                    allCalcas[activeCalca + 1].classList.add("active");
                }
                } else {
                if (activeCalca == 0) {
                    allCalcas[allCalcas.length - 1].classList.add("active");
                } else {
                    allCalcas[activeCalca - 1].classList.add("active");
                }
                }
                break;
            default:
                console.log("Parte não reconhecida");
            }
        }
        function Salvar(){
            let itemsAtuais = document.querySelectorAll('.character .active')
            itemsAtuais.forEach((itemAtual , index) => {
                if(typeof itemsAnteriores[index] == 'undefined'){
                    fetch(`proc_troca.php?userId=${UserID}
                    &itemAtivo=${itemAtual.getAttribute('id')}`, {
                            method: "GET"
                        }).then(() => {
                            location.reload()
                    })
                }else{
                    if(itemsAnteriores[index].getAttribute('id') != itemAtual.getAttribute('id')){
                    fetch(`proc_troca.php?userId=${UserID}
                    &itemAtivo=${itemAtual.getAttribute('id')}
                    &itemDesativado=${itemsAnteriores[index].getAttribute('id')}`, {
                            method: "GET"
                        }).then(() => {
                            location.reload()
                    })
                }
                }
            })
        }
    </script>
</main>
</body>