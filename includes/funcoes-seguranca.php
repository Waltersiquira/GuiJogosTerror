<?php 
function proteger_contra_xss_e_sql_injection($valor){
    require_once 'lojas.php';
    global $lojas;
    $valor = $lojas->real_escape_string($valor);
    $valor = htmlspecialchars($valor);
    return $valor;
}
?>