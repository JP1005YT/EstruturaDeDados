<?php
$json = json_decode(file_get_contents('../../backend/temas/'.$_GET['class']),true);
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title> DataStruct School | <?php $json['nome']?></title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
        <link rel="shortcut icon" href="./../../logo.png" />
    </head>
    <body>
        <main>
        <?php
            echo $json['content'];
        ?>
        </main>
        <script>
            document.title = `DataStruct | ${}`
        </script>
    </body>
</html>