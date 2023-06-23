<?php
    include("conexao.php");
    
    $Nome = $_POST["Nome"];
    $Idade = $_POST["Idade"];

    $Endereco = $_POST["Endereco"];
    $Provincia = $_POST["Provincia"];

    $Email = $_POST["Email"];

    $Telefone = $_POST["Telefone"];
    $Pass = md5($_POST["Pass"]);
    
    
    try {
        //code...
        $cadastrar = $conn->prepare("INSERT INTO babysitter (nome_baby, idade, endereco_baby, provincia, email, telefone, senha) values(:Nome, :Idade, :Endereco, :Provincia,:Email, :Telefone, :Pass)");
        $cadastrar->bindValue(':Nome',$Nome);
        $cadastrar->bindValue(':Idade',$Idade);

        $cadastrar->bindValue(':Endereco',$Endereco);
        $cadastrar->bindValue(':Provincia',$Provincia);

        $cadastrar->bindValue(':Email',$Email);

        $cadastrar->bindValue(':Telefone',$Telefone);
        $cadastrar->bindValue(':Pass',$Pass);

        $cadastrar->execute();
    } 
    catch (PDOException $warning) {

        echo ("Ocorreu um erro no: {$warning->getMessage()}");   
    }
?>