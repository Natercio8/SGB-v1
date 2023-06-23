<?php
    include("conexao.php");
    

    $Tipo = $_POST["Tipo"];
    $Total = $_POST["Total"];

    try {
        //code...
        $actualizar = $conn->prepare("UPDATE servico SET senhas_emitidas ='$Total' WHERE tipo_servico ='$Tipo'");
        $actualizar->execute();

    } catch (PDOException $warning) {

        echo ("Ocorreu um erro no: {$warning->getMessage()}");
        
        //throw $th;
    }
?>