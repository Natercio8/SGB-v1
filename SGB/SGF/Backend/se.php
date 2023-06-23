<?php
    include("conexao.php");
    
    $Tipo = $_POST["Tipo"];

    $Total = $_POST["Total"];
    $num_balcao = $_POST["num_balcao"];
    $add = 1;

    try {
        //code...
      

        $se = $conn->prepare("UPDATE servico SET senha_actual ='$Total' WHERE tipo_servico ='$Tipo'");
        $se->execute();
    
        $Balcao = $conn->prepare("UPDATE balcao SET total_senhas ='$add' WHERE num_balcao ='$num_balcao'");
        $Balcao->execute();

    } catch (PDOException $warning) {

        echo ("Ocorreu um erro no: {$warning->getMessage()}");
        
        //throw $th;
    }
?>
