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

$entrada = new Entrada();

if(isset($_GET['id'])) {
    if($entrada->buscar($_GET['id'])) {
        $accion = "editar";
    } else {
        $accion = "crear";
    }
} else {
    $accion = "crear";
}

if(isset($_POST['accion'])) {
    if($_POST['accion'] == 'editar') {
        $entrada->editar(['titulo' => $_POST['titulo'],'texto' => $_POST['texto'], 'imagen' => '']);
        header("Location: index.php");
    } elseif($_POST['accion'] == 'crear') {
        $entrada->guardar(['titulo' => $_POST['titulo'],'texto' => $_POST['texto'], 'imagen' => '']);
        header("Location: index.php");
    }
}

include('vistas/cabecera.php');
include('vistas/entrada_formulario.php');
include('vistas/pie.php');