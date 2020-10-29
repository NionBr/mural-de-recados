<?php
session_start();
require_once 'db_connect.php';

if(isset($_POST['btn-salvar'])){

    $recado = mysqli_escape_string($connect, $_POST['recado']);
        
    $sql = "INSERT INTO recados (recado) VALUES ('$recado')";
    
    if(mysqli_query($connect, $sql)){
        $_SESSION['mensage'] = "Recado salvo :-)";
        header('Location: ../index.php');
    }else{
        $_SESSION['mensage'] = "Ouve algum erro :-(";
        header('Location: ../index.php');
    }
    
}