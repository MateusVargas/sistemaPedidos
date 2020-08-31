<?php
    session_start(); 	//iniciando uma sessao
    if (!isset($_SESSION['usuario'])) {//Verifica se não há seções
        session_destroy();				//se não houver destroi a seção por segurança
        header("Location: index.html");
        exit;	//redireciona o visitante para login
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Administração</title>
</head>
<body>
    
    <div class="container-fluid">

        <h3 class="text-center">Todos os pedidos</h3>
        <a href="../bd/logout.php" class="btn btn-danger float-right">Sair</a>

        <?php

            include_once '../bd/conexao.php';

            $sql = "SELECT * FROM pedido";
            $listar = $conectar->prepare($sql);
        
            if($listar->execute()){
        ?>

            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Pedido</th>
                        <th scope="col">Situação</th>
                        <th scope="col" style="text-align:center; background: rgb(19, 194, 19)">Opções</th>
                    </tr>
                </thead>
            <tbody>

        <?php
                while ($resultado = $listar->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <tr>                 
                    <td><?php echo $resultado['nome']; ?></td>
                    <td><?php echo $resultado['solicitacao']; ?></td>
                    <td><?php echo $resultado['situacao']; ?></td>
                    <td style="text-align:center;"><button id="<?php echo $resultado['id']; ?>" class="btn btn-info visualizar" type="button" data-toggle="modal" data-target="#infoModal">Detalhes</button>
                    <button id="<?php echo $resultado['id']; ?>" class="btn btn-primary abrirAtualizar" data-toggle="modal" data-target="#atualizarModal" type="button">Alterar</button>
                    <button id="<?php echo $resultado['id']; ?>" class="btn btn-danger deletar" type="button">Apagar</button></td>
                </tr>  

            <?php
                }
            ?>
            </tbody>
        </table>
                
        <?php
            }else {
               echo "<div class='alert alert-danger' role='alert'>Não há registros no banco de dados!</div>";
            } 
        ?>

    </div>

    <div id="infoModal" class="modal fade">
        <div class="modal-dialog">
            <form>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Detalhes do pedido:</h4>
                    </div>
                    <div class="modal-body">
                        <label>Id do Pedido:</label>
                            <p id="id" class="font-weight-bold"></p><br>

                        <label>CEP:</label>
                            <p id="cep" class="font-weight-bold"></p><br>

                        <label>ESTADO:</label>
                            <p id="estado" class="font-weight-bold"></p><br>

                        <label>CIDADE:</label>
                            <p id="city" class="font-weight-bold"></p><br>

                        <label>BAIRRO:</label>
                            <p id="bairro" class="font-weight-bold"></p><br>

                        <label>LOGRADOURO:</label>
                            <p id="rua" class="font-weight-bold"></p><br>

                        <label>COMPLEMENTO:</label>
                            <p id="compl" class="font-weight-bold"></p><br>

                        <label>NÚMERO:</label>
                            <p id="numero" class="font-weight-bold"></p><br>

                        <label>TELEFONE:</label>
                            <p id="fone" class="font-weight-bold"></p><br>

                        <label>ENDEREÇO IP:</label>
                            <p id="ip" class="font-weight-bold"></p><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="atualizarModal" class="modal fade">
        <div class="modal-dialog">
            <form>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Atualizar Pedido:</h4>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <label class="font-weight-bold">Situação:</label><br/>
                            <input type="hidden" id="idAtualizar">
                            <input type="radio" id="pendente" name="radio" value="pendente">Pendente
                            <input type="radio" id="concluido" name="radio" value="concluido">Concluído<br>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        <button id="atualizar" type="button" class="btn btn-primary">Atualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
                

    <script src="../js/script.js"></script>

</body>
</html>