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
        
    }
    $deletar = $conn->prepare("DELETE FROM `babysitter` WHERE id_baby = $id");
    $deletar->execute();

    if ($deletar) {
        # code...

        header("location:babysitters.php");
    }
    else {
        # code...
        echo "<script> alert('Ocorreu um erro!') </script>";
    }
?>
