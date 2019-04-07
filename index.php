<?php
require_once("config.php");

/*$matheus = new Usuario();

$matheus->loadById(2);

echo $matheus;

echo "<br><br>===================================================<br><br>";

$lucas = new Usuario();

$lucas->loadById(3);

echo $lucas;

echo "<br><br>===================================================<br><br>";

$root = new Usuario();

$root->loadById(7);

echo $root;
echo "<br><br>===================================================<br> Lista de usuarios<br>";
$lista = Usuario::getList();

echo json_encode($lista);

echo "<br><br>===================================================<br> Procurar Usuario<br>";
$matheus2 = Usuario::search("lo");

echo json_encode($matheus2);

echo "<br><br>===================================================<br> Localizando por Login e senha<br>";*/

//carregar um usuario usando um login e uma senha
$login  = new Usuario();
$login->login("LegendOfLegaia","otimorpg");
echo $login;
?>