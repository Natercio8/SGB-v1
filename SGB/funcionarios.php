<?php
    require('Backend/conexao.php');
    session_start();

    if(!isset($_SESSION['id_func'])){

        header("location:index.php");
        exit;
    }
    else{

        $cargo = "";
        $id_func = $_SESSION['id_func'];

        $id_cargo = $_SESSION['id_cargo'];
        $nome = $_SESSION['nome_func'];

        if ($id_cargo == 1) {
            # code...
            $cargo = "Gerente";
        } else {
            # code...
            $cargo = "Secretário(a)";
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>   
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="IMG/ico.png" type="image/x-icon">
        <link rel="stylesheet" href="CSS/adm.css">
        <title><?php echo "$cargo: "."$nome"; ?></title>
    </head>

    <body>
            <div class="header">
                <header>
                    <nav>
                        <ul>
                        <li><a href="clientes.php">Clientes</a></li>
                            <li><a href="#" style="color: rgb(0, 55, 235);">Funcionarios</a></li>
                            <li><a href="babysitters.php">Babysitters</a></li>
                            <li><a href="contratos.php">Contratos</a></li>
                            <li><a href="Backend/sair.php">X</a></li>
                        </ul>
                    </nav>
                </header>
            </div>
            <br><br>
        <div class="fsobre">
            <br><br>
            <div class="fcentro">         
                <table border="0">
                    <tr>
                        <th>N</th>
                        <th>Cargo</th>
                        <th>Codigo</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Senha</th>
                        <th colspan="2"> <button onclick="mostrar()" id="bc">Adicionar</button> </th>
                    </tr>
                    
                    <?php
                        $func = $conn->prepare("SELECT * FROM funcionario join cargo on funcionario.id_cargo = cargo.id_cargo where cargo = 'secretária(o)'");
                        $func->execute();
                        $res=$func->fetchAll();
                           
                        for($i=0; $i<sizeof($res); $i++){
                            $values = $res[$i];
                        ?>            
                    <tr>
                        <td> <?php echo $values['id_func'];?> </td>
                        <td> <?php echo $values['cargo'];?> </td>
                        <td> <?php echo $values['cod_func'];?> </td>
                        <td> <?php echo $values['nome_func'];?> </td>
                        <td> <?php echo $values['telefone'];?> </td>
                        <td> *************************** </td>
                        
                        <td> <button><a href="#">Editar</a></button> </td>
                        <td> <button id="b"><a href="apagar.php?id=<?php echo ($values['id_func']);?>">Deletar</a></button> </td>
                        <?php }?>
                    </tr>
            
                </table>
            </div>
            <br><br>
            <div class="add">
                <form method="post" class="addForm">
                <div class="label">
                    <label>Cargo</label>
                    <?php
                        $part = $conn->prepare("SELECT * FROM cargo where id_cargo = 2");
                        $part->execute();
                        $res=$part->fetchAll();
                    ?>
                    <select name="Id_cargo" id="prov">
                        <option value=""></option>
                        <?php
                            for($i=0; $i<sizeof($res); $i++){
                                $values = $res[$i];
                            ?>
                                <option value="<?php echo $values['id_cargo'];?>"><?php echo $values['cargo'];?></option>
                            <?php }?>
                        
                            </select>
                    </div>
                    <input type="number" name="Codigo" placeholder="Codigo" min="100000">
                    <input type="text" name="Nome" placeholder="Nome">
                    <input type="number" name="Telefone" placeholder="Telefone">
                    <input type="text" name="Senha" placeholder="Senha">
                    <button type="submit" id="cad">Cadastrar</button>
                </form>

            </div>
            <script>
                function mostrar() {
                    
                    var display = document.querySelector('.add').style.display;
                    

                    if (display == "none") {
                        document.querySelector('.add').style.display = 'block';
                    } else {
                        document.querySelector('.add').style.display = 'none';
                    }
                }
            </script>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
        $Id_cargo = $_POST['Id_cargo'];
        $Codigo = $_POST['Codigo'];
        $Nome = $_POST['Nome'];
        $Telefone = $_POST['Telefone'];
        $Senha = md5($_POST['Senha']);

        try {
            //code...
            $cadastrar = $conn->prepare("INSERT INTO funcionario (id_cargo, cod_func, nome_func, telefone, senha) values(:Id_cargo, :Codigo, :Nome, :Telefone, :Senha)");
            $cadastrar->bindValue(':Id_cargo',$Id_cargo);

            $cadastrar->bindValue(':Codigo',$Codigo);
            $cadastrar->bindValue(':Nome',$Nome);

            $cadastrar->bindValue(':Telefone',$Telefone);
            $cadastrar->bindValue(':Senha',$Senha);
    
            $cadastrar->execute();
        } 
        catch (PDOException $warning) {
    
            echo ("Ocorreu um erro no: {$warning->getMessage()}");   
        }
    }

?>