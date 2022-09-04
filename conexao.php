<?php
    $servidor = "Localhost";
    $usuario = "loja";
    $senha = "123456";
    $banco = "dblojavirtual";

    $cn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
?>