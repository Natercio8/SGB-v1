<?php
    require('Backend/conexao.php');
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>   
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="IMG/ico.png" type="image/x-icon">
        <link rel="stylesheet" href="CSS/home.css">
        <title>Login</title>
    </head>

    <body>
        <div class="indexContainer">
            <div class="fundo">
                <br><br><br><br><br><br><br>
                <div class="form">
                    <p>A. B. Ester</p>
                    <form method="post">
                        <input type="number" name="codigo" min="100000" placeholder="Codigo de Acesso" required>
                        <input type="password" name="senha" placeholder="Palavra-Passe" required>
                        <button type="submit" class="btn">Acessar</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php

    if (isset($_POST['codigo'])) {
        # code...
        $codigo = $_POST['codigo'];
        $senha = md5($_POST['senha']);

        try {

            $conectar = $conn->prepare("SELECT * FROM funcionario where cod_func=:codigo AND senha=:senha");
            $conectar->bindValue(':codigo',$codigo);

            $conectar->bindValue(':senha',$senha);
            $conectar->execute();

            $buscarDados = $conectar->fetch(PDO::FETCH_ASSOC);
            
             if (empty($buscarDados)) {
            # code...
                echo "<script> alert('Dados inválidos!') </script>";
            }
            else{
                    
               $_SESSION['id_func'] = $buscarDados['id_func'];
               $_SESSION['id_cargo'] = $buscarDados['id_cargo'];
               $_SESSION['nome_func'] =  $buscarDados['nome_func'];

               if ($_SESSION['id_cargo'] == 1) {
                   # code...
                   header("location:adm.php");
               }
               else{
                    header("location:home.php");
               }

               
            }
        }
            
        catch (PDOException $warning) {
            echo "Ocorreu um erro no: {$warning->getMessage()}";
        }
    }
?>