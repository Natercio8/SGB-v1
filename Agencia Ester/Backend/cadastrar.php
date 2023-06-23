<?php
    include("conexao.php");
    
    $Nome = $_POST["Nome"];

    $Endereco = $_POST["Endereco"];
    $Email = $_POST["Email"];

    $Telefone = $_POST["Telefone"];
    $Pass = md5($_POST["Pass"]);
    
    try {
        //code...
        $cadastrar = $conn->prepare("INSERT INTO cliente (nome_cliente, endereco_cliente, email_cliente, telefone_cliente, senha) values(:Nome, :Endereco, :Email, :Telefone, :Pass)");
        $cadastrar->bindValue(':Nome',$Nome);

        $cadastrar->bindValue(':Endereco',$Endereco);
        $cadastrar->bindValue(':Email',$Email);

        $cadastrar->bindValue(':Telefone',$Telefone);
        $cadastrar->bindValue(':Pass',$Pass);

        $cadastrar->execute();
    } 
    catch (PDOException $warning) {

        echo ("Ocorreu um erro no: {$warning->getMessage()}");   
    }
?>