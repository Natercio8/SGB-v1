<?php
    include("Backend/conexao.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
       
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="IMG/ico.png" type="image/x-icon">
        <link rel="stylesheet" href="CSS/style.css">
        <title>Acessar</title>
    </head>

    <body>
        <div class="imagem">
            <div class="header">
                <header>
                    <nav>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="index.html#trabalho">Serviços</a></li>
                            <li><a href="index.html#sobre">Sobre</a></li>
                            <li><a href="index.html#contacto">Contacto</a></li>
    
                        </ul>
                    </nav>
                </header>
            </div>
            <br><br><br><br><br><br>
            <div class="texto">
                <h1>A plataforma <br> de cuidados infantis <br> em que os pais confiam</h1>
            </div>
        </div>
            <div class="clienteCadastro" id="conta">
                <br><br><br>  <br><br><br>
                <div class="form">
                    <form method="post">
                        <input type="email" name="email" placeholder="Email">
                        <input type="password" name="senha" placeholder="Password">
                        <br>
                        <button type="submit">Entrar</button>
                      
                    </form>
                </div>
            </div>
        
            <div class="links">
                <br><br><br>
                <div class="seguir">
                    <div class="seguirSub">
                        <br>
                        <h2>Endereço</h2>
                        <br>
                        <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit, tempora quia nihil dolores. </p>
                        <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit, tempora quia nihil dolores. </p>
                    </div>
                    <div class="seguirSub">
                        <br>
                        <h2>Redes Sociais</h2>
                        <br>
                        <ul>
                            <li> <a href="#">Facebook</a> </li>
                            <li> <a href="#">Twitter</a> </li>
                            <li> <a href="#">Instagram</a> </li>

                        </ul>
                    </div>
                    <div class="seguirSub">
                        <br>
                        <h2>Links</h2>
                        <br>
                        <ul>
                            <li> <a href="index.html">Home</a> </li>
                            <li> <a href="index.html#sobre">Sobre</a> </li>
                            <li> <a href="index.html#trabalho">Serviços</a> </li>
                            <li> <a href="index.html#contacto">Contacto</a> </li>
                            <li> <a href="#cliente">Encontrar uma Babysitter</a> </li>
                            <li> <a href="index.html#trabalho">Trabalhar como babysitter</a> </li>

                        </ul>
                    </div>
                </div>
            </div>
        
        <div class="rodape">
            <p id="p1"><a href="index.html">&copy;A.B. Ester</a>. All Rights Reserved.</p>
            <p id="p2">Designed by <a href="index.html">TMO: Studio</a></p>
            
        </div>

    </body>
</html>
<?php
    if (isset($_POST['email'])) {
        # code...
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        
        try {
            //code...
            $conectar = $conn->prepare("SELECT * FROM babysitter where email=:email AND senha=:senha");
            $conectar->bindValue(':email',$email);
    
            $conectar->bindValue(':senha',$senha);
            $conectar->execute();
    
            $buscarDados = $conectar->fetch(PDO::FETCH_ASSOC);
            if (empty($buscarDados)) {
                # code...
                echo "<script> alert('Dados inválidos!') </script>";
            }
            else{
                        
                $_SESSION['id_baby'] = $buscarDados['id_baby'];
                $_SESSION['nome_baby'] = $buscarDados['nome_baby'];
    
                $_SESSION['endereco_baby'] = $buscarDados['endereco_baby'];
                header("location:Bdashboard.php");
            }
        }
        catch (PDOException $warning) {
    
            echo ("Ocorreu um erro no: {$warning->getMessage()}");   
        }
    }
?>