<?php
    include("Backend/conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
       
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="IMG/ico.png" type="image/x-icon">
        <link rel="stylesheet" href="CSS/style.css">
        <title>Candidatar - me</title>
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
            <div class="clienteCadastro" id="baby">
                <br>
                <div class="form">
                    <form method="post">
                        <input type="text" name="Nome" placeholder="Nome Completo">
                        <input type="number" name="Idade" placeholder="Idade">
                        <textarea name="sobre" id="" cols="30" rows="5" style="resize: none; width: 480px; border-radius:10px; margin-left:20px; padding:5px;outline:none; background-color:rgb(224, 224, 224); font-size: large;" placeholder="Sobre"></textarea>
                        <input type="text" name="Endereco" placeholder="Endereço">

                        <div class="label">
                            <label>Provincia</label>
                            <?php
                                $part = $conn->prepare("SELECT * FROM provincia");
                                $part->execute();
                                $res=$part->fetchAll();
                            ?>
                            <select name="Provincia" id="prov">
                                <option value=""></option>
                                <?php
                                    for($i=0; $i<sizeof($res); $i++){
                                        $values = $res[$i];
                                ?>
                                    <option value="<?php echo $values['id_prov'];?>"><?php echo $values['nome_prov'];?></option>
                                <?php }?>
                        
                            </select>
                        </div>
                        <input type="email" name="Email" placeholder="Email">
                        <input type="number" name="Telefone" placeholder="Telefone" min="0">
                        <input type="password" name="Pass" placeholder="Password">
                        <br>
                        <button type="submit">Enviar candidatura</button>
                        <br>
                        <a href="loginbaby.php#conta">Já tenho uma conta</a>
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
            <div>
                <p id="teste"></p>
            </div>
        
        <div class="rodape">
            <p id="p1"><a href="index.html">&copy;A.B. Ester</a>. All Rights Reserved.</p>
            <p id="p2">Designed by <a href="index.html">TMO: Studio</a></p>
            
        </div>
    </body>

</html>
<?php
    if (isset($_POST['Nome'])) {
        # code...
        try {
            //code...
            $Nome = trim($_POST["Nome"]);
            $Idade = $_POST["Idade"];
        
            $Endereco = $_POST["Endereco"];
            $Provincia = $_POST["Provincia"];
        
            $Email = $_POST["Email"];
        
            $Telefone = $_POST["Telefone"];
            $Pass = md5($_POST["Pass"]);
            $estado = "";
            $id_baby;

            if ($Idade <= 17 ) {
                # code...
                echo("<script>alert('Menor de idade!')</script>");
            } else {
                # code...
                $cadastrar = $conn->prepare("INSERT INTO babysitter (nome_baby, idade, endereco_baby, provincia, email, telefone, senha, estado)
                 values (:Nome, :Idade, :Endereco, :Provincia,:Email, :Telefone, :Pass, :estado)");
                $cadastrar->bindValue(':Nome',$Nome);
                $cadastrar->bindValue(':Idade',$Idade);
    
                $cadastrar->bindValue(':Endereco',$Endereco);
                $cadastrar->bindValue(':Provincia',$Provincia);
    
                $cadastrar->bindValue(':Email',$Email);
    
                $cadastrar->bindValue(':Telefone',$Telefone);
                $cadastrar->bindValue(':Pass',$Pass);
                $cadastrar->bindValue(':estado',$estado);

                $cadastrar->execute();
            } 
        } 
        catch (PDOException $warning) {
    
            echo ("Ocorreu um erro no: {$warning->getMessage()}");   
        }
    }
?>