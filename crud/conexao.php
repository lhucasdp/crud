<?php
$servername = "localhost";
$login = "user";
$senha = "123456";
$DB = "crud";

$conn = new mysqli($servername, $login, $senha, $DB) or die ('Não foi possível conectar');