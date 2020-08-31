<?php
    include_once 'conexao.php';

    if (isset($_POST['idVisualizacao'])) {
        $id = $_POST['idVisualizacao'];
        $retorno = array();
        $sql = "SELECT * FROM pedido WHERE id = ?";
        $buscar = $conectar->prepare($sql);
        $buscar->bindValue(1,$id);
        $buscar->execute();

        $resultado = $buscar->fetchAll();

        foreach($resultado as $r){
            $retorno['id'] = $r['id'];
            $retorno['cep'] = $r['cep'];
            $retorno['estado'] = $r['estado'];
            $retorno['cidade'] = $r['cidade'];
            $retorno['bairro'] = $r['bairro'];
            $retorno['logradouro'] = $r['logradouro'];
            $retorno['complemento'] = $r['complemento'];
            $retorno['numero'] = $r['numero'];
            $retorno['telefone'] = $r['telefone'];
            $retorno['ip'] = $r['ip'];
        }

        echo json_encode($retorno);
    }


    if (isset($_POST['idAtualizar'])) {
        $idRetornar = null;
        $id = $_POST['idAtualizar'];
        $sql = "SELECT * FROM pedido WHERE id = ?";
        $buscar = $conectar->prepare($sql);
        $buscar->bindValue(1,$id);
        $buscar->execute();

        $resultado = $buscar->fetchAll();

        foreach($resultado as $r){
            $idRetornar = $r['id'];
        }

        echo $idRetornar;
    }


?>