<?php
include('modelos/Entrada.php');
include('modelos/db.php');

$entradas = Entrada::buscarTodas();

include('vistas/cabecera.php');
include('vistas/listado.php');
include('vistas/pie.php');