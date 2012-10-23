<?php
    $cep = isset($_GET["cep"])? $_GET["cep"] : ""; 

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "www.liceuasabin.br/cep.ajax.php?cep=" . $cep);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
    $rs = curl_exec($ch);
    $retorno = curl_getinfo($ch);
    curl_close($ch);
    echo $rs;

?>
