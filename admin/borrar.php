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
        $entrada->borrar();
        header("Location: index.php");
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}