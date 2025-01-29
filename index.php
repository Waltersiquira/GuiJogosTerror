<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=delete" />
    <title>GuiJogosTerror</title>
</head>
<body>
    <button><a href="adcionar-jogo-terror.php" style="text-decoration: none;">Adcionar Jogo de Terror</a></button>
    <?php 
    require_once 'includes/lojas.php';
    require_once 'layouts/direitos.php';
    ?>
    <h1>GuiJogosTerror</h1>
    <hr>
    <table>
        <?php 
        $busca = $lojas->query('select * from jogos_terror');
        if (!$busca){
            echo "Erro";
        } else {
            if ($busca->num_rows == 0){
                echo 'Existe nenhum jogo de terror no momento';
            } else {
                while ($reg=$busca->fetch_object()){
                    echo "<tr><td><a href='pagina-jogo-terror.php?i=$reg->id'><img src='$reg->imagem'></a></td><td>$reg->nome</td><td><a href='deletar-jogo-terror.php?i=$reg->id' style='color: black;'><span class='material-symbols-outlined'>delete</span></a></td></tr>";
                }
            }
        }
        ?>
    </table>
    <?php direitos() ?>
    <?php $lojas->close() ?>
</body>
</html>