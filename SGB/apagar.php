<?php
    require('Backend/conexao.php');
    session_start();

    if(!isset($_SESSION['id_func'])){

        header("location:index.php");
        exit;
    }
    else{


        $_SESSION['id'] = $_GET['id'];
        $id = $_SESSION['id'];
        $id_cargo = $_SESSION['id_cargo'];
        
    }
    $deletar = $conn->prepare("DELETE FROM `funcionario` WHERE id_func = $id");
    $deletar->execute();

    if ($deletar) {
        # code...
        echo "<script> alert('Funcionario Deletado!') </script>";
        header("location:funcionarios.php");
    }
    else {
        # code...
        echo "<script> alert('Ocorreu um erro!') </script>";
    }
?>