<?php 
function direitos(){
    $ip = $_SERVER['REMOTE_ADDR'];
    $data = date('d/m/Y');
    echo "<footer><p>O $ip acessou o site em $data <br> &copy; GuiJogosTerror 2025.</p></footer>";
}
?>