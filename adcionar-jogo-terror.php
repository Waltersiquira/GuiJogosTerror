<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_back" />
    <title>GuiJogosTerror</title>
</head>
<body>
    <?php 
    require_once 'includes/lojas.php';
    require_once 'includes/funcoes-seguranca.php';
    require_once 'layouts/direitos.php';
    ?>
    <form method="get">
        digite o nome do jogo de terror <br>
        <input type="text" name="nome" required> <br>
        digite a descrição do jogo de terror <br>
        <input type="text" name="descrição" required> <br>
        digite o preço do jogo de terror <br>
        <input type="number" name="preço" step="0.1" required> <br>
        digite a url da imagem do jogo de terror <br>
        <input type="url" name="imagem"> <br>
        <input type="submit">
    </form>
    <?php 
    $nome = proteger_contra_xss_e_sql_injection($_GET['nome'] ?? '');
    $descrição = proteger_contra_xss_e_sql_injection($_GET['descrição'] ?? '');
    $preço = proteger_contra_xss_e_sql_injection($_GET['preço'] ?? '');
    $imagem = proteger_contra_xss_e_sql_injection($_GET['imagem'] ?? '');
    if (!empty($nome) and !empty($descrição) and !empty($preço)){
        if (empty($imagem)){
            if ($lojas->query("INSERT INTO jogos_terror VALUES (DEFAULT, '$nome', '$descrição', '0', '$preço', DEFAULT)") == true){
                echo 'Jogo de Terror Adcionado com Sucesso✅ <br>';
            } else {
                echo 'Erro ao Inserir Dados <br>';
            }
        } else {
            if ($lojas->query("INSERT INTO jogos_terror VALUES (DEFAULT, '$nome', '$descrição', '0', '$preço', '$imagem')") == true){
                echo 'Jogo de Terror Adcionado com Sucesso✅ <br>';
            } else {
                echo 'Erro ao Inserir Dados <br>';
            }
        }
    } else {
        echo 'Adicione os Dados do Jogo de Terror <br>';
    }
    ?>
    <button><a href="index.php" style="color: black;"><span class="material-symbols-outlined">arrow_back</span></a></button>
    <?php direitos() ?>
    <?php $lojas->close() ?>
</body>
</html>