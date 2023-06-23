<?php
    require('Backend/conexao.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/login.css">
        <link rel="shortcut icon" href="IMG/isia1.png" type="image/x-icon">
        <title>Login</title>
    </head>
    <body>
        <div class="header">

            <div class="h-1">
                <img src="IMG/isia1.png" alt="">
            </div>
    
           <div class="h-2">
                <h3>INSTITUTO SUPERIOR POLITECNICO INTERNACIONAL DE ANGOLA</h3>
           </div>

        </div>
 
        <div class="corpo">
            <div class="container">
                <div class="formulario">
                    <form method="post">
                        <div class="inputL">
                            <input type="number" name="identificador" placeholder="Codigo de Acesso" min="0">
                        </div>
                        
                        <div class="inputL">
                            <input type="password" name="senha" placeholder="Palavara-Passe">
                        </div>
        
                        <div class="btns">
                            <button type="submit" class="btn">Acessar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
        <div class="rodape">
            <footer>
                <span>
                    <h4>DM & TMO : Systems &copy; Copyright 2023</h4>
                </span>
            </footer>
        </div>
        <br><br><br><br>
    </body>
</html>
<?php
    if (isset($_POST['identificador'])) {
        # code...
        $identificador = $_POST['identificador'];
        $senha = md5($_POST['senha']);

        $conectar = $conn->prepare("SELECT * FROM funcionario where codigo=:identificador AND senha=:senha");
        $conectar->bindValue(':identificador',$identificador);

        $conectar->bindValue(':senha',$senha);
        $conectar->execute();

        $buscarDados = $conectar->fetch(PDO::FETCH_ASSOC);
        if (empty($buscarDados)) {
            # code...
            echo "<script> alert('Dados inválidos!') </script>";
        }
        else{
                    
            $_SESSION['id'] = $buscarDados['id'];
            $_SESSION['num_balcao'] = $buscarDados['num_balcao'];

            $_SESSION['codigo'] = $buscarDados['codigo'];
            $_SESSION['nome'] = $buscarDados['nome'];


            header("location:dashboard.php");
        }
    }
    
?>


<!--
    TMO: Studio; copyright 2023
            The Mark Of
    ...............................
    ...............................
                ......
                ......
                ......
                ......
                ......
                ......
                ......
                ......
                ......
                ......
                ......
            ....      ....
        ........      ........
    ............      ............
     ..                        ..
                ......
                 ....
                  ..


-->