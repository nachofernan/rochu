<?php
session_start();

include('../modelos/db.php');
include('../modelos/Entrada.php');

$db = new DB();

if(!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header("Location: login.php");
} else {
    $user = $db->fetch("select * from usuarios where id = ?", [$_SESSION['id']]);
    if(!$user) {
        header("Location: login.php");
    }
}

$entradas = Entrada::buscarTodas();

include('vistas/cabecera.php');
include('vistas/listado_entradas.php');
include('vistas/pie.php');