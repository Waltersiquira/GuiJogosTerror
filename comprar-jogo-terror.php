<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_back" />
    <title>GuiJogosTerror</title>
</head>
<body style="text-align: center;">
    <?php 
    require_once 'includes/lojas.php';
    require_once 'layouts/direitos.php';
    ?>
    <?php 
    $id = $lojas->real_escape_string($_GET['i'] ?? '');
    if ($lojas->query("UPDATE jogos_terror SET vendas = vendas + 1 WHERE id = '$id'")){
        echo "<h1>Aprovado</h1> <img src='https://upload.wikimedia.org/wikipedia/commons/8/84/Approved_img.png' width='400'> <p>Jogo de Terror Comprado com Sucesso✅</p>";
    } else {
        echo 'Erro ao Mudar Dados';
    }
    ?>
    <button><a href="index.php" style="color: black;"><span class="material-symbols-outlined">arrow_back</span></a></button>
    <?php direitos() ?>
    <?php $lojas->close() ?>
</body>
</html>