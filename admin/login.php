<?php
session_start();
if(isset($_SESSION['id']) || !empty($_SESSION['id'])) {
    session_destroy();
    session_start();
}

include('../modelos/db.php');

if(isset($_POST['username']) && isset($_POST['password'])) {
    $db = new DB();
    $password = md5($_POST['password']);
    $user = $db->fetch("select * from usuarios where username = ? and password = ?", [$_POST['username'], $password]);
    if($user) {
        $_SESSION['id'] = $user['id'];
        header("Location: index.php");
    }
}

include('vistas/cabecera.php');
include('vistas/login.php');
include('vistas/pie.php');

var_dump(md5($_POST['password']));

/**
 * 
 * tecnouno = 72a1d52065cb76c551aead9c85e69e1c
 * rochu123 = 2f9af0570370571bf8500f89181b0e1c
 * 
 */

?>