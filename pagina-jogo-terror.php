<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_back" />
    <title>GuiJogosTerror</title>
</head>
<body>
    <?php 
    require_once 'includes/lojas.php';
    require_once 'layouts/direitos.php';
    ?>
    <?php 
    $id = $lojas->real_escape_string($_GET['i'] ?? '');
    $busca = $lojas->query("select * from jogos_terror where id = '$id'");
    if (!$busca){
        echo 'Erro <br>';
    } else {
        if ($busca->num_rows == 0){
            echo 'Existe nenhum Jogo de Terror no momento <br>';
        } else {
            while ($reg=$busca->fetch_object()){
                $preço = number_format($reg->preço, 2, ',', '.');
                echo "<img src='$reg->imagem' width='300'> <h3>$reg->nome</h3> <h4>R$$preço</h4> Vendas: $reg->vendas <hr> <p>$reg->descrição</p> <button style='background-color: blue;'><a href='comprar-jogo-terror.php?i=$reg->id' style='color: white; text-decoration: none;'>Comprar</a></button> <br>";
            }
        }
    }
    ?>
    <button><a href="index.php" style="color: black;"><span class="material-symbols-outlined">arrow_back</span></a></button>
    <?php direitos() ?>
    <?php $lojas->close() ?>
</body>
</html>