<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> DataStruct School | Entrar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="shortcut icon" href="../../logo.png" />
</head>
<body>
    <header class="mainHeader">
        <div class="logo">
            <img src="../../logo.png" height="70px">
            <h1>DataStruct School</h1>
        </div>
        <nav>
            <ul>
                <li>Página Principal</li>
                <li>Temas</li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="" method="POST">
            <h1>Entrar</h1>
            <input placeholder="Email" name="email">
            <input placeholder="Senha"  name="senha">
            <input type="submit" value="Entrar">
            <p>Não possui conta? <span onclick="switchPages('../Cadastrar')">Criar</span></p>
        </form>
    </main>
    <script>
        function switchPages(url){
            window.location.href = url
        }
    </script>
</body>