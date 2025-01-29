<?php 
$lojas = new mysqli('localhost', 'root', '', 'lojas');
if ($lojas->connect_errno){
    die('Erro de Conexão com Banco de Dados');
}
$lojas->query('set character_set_connection = utf8mb4');
$lojas->query('set character_set_client = utf8mb4');
$lojas->query('set character_set_results = utf8mb4');
?>