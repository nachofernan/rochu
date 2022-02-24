<?php
include('modelos/Entrada.php');
include('modelos/db.php');

$entrada = new Entrada();

/* 
$datos = ['titulo' => 'Segundo titulo',
            'texto' => 'Texto de prueba para el segundo texto', 
            'imagen' => 'img.jpg'];

$entrada->guardar($datos); */

$entrada_nueva = new Entrada();
$entrada_nueva->buscar(2);

echo "<pre>";

var_dump($entrada_nueva);


$entradas = Entrada::buscarTodas();
var_dump($entradas);