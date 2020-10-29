<?php
session_start();
require_once 'db_connect.php';

if(isset($_POST['btn-deletar'])){
    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "DELETE FROM recados WHERE id = $id";

    if(mysqli_query($connect, $sql)){
        $_SESSION['mensage'] = " Pronto foi deletado :-)";
        header('Location: ../index.php');
    }else{
        $_SESSION['mensage'] = "Ouve algum erro :-(";
        header('Location: ../index.php');
    }
}