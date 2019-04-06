<?php
require_once("config.php");

$matheus = new Usuario();

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
?>