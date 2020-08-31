<?php

    include_once 'conexao.php';

    if (isset($_POST['login']) && isset($_POST['senha'])) {
        $usuario = $_POST['login'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM user WHERE usuario = ? AND senha = ?";
        $verificar = $conectar->prepare($sql);
        $verificar->bindValue(1,$usuario);
        $verificar->bindValue(2,$senha);
        $verificar->execute();
        $dados = $verificar->fetch();//(PDO::FETCH_ASSOC);

       // $count = count($dados);
       // var_dump($dados);
        if(!empty($dados)){
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("Location: ../admin/listar.php");
            return true;
            exit();
        }else{
            return false;
        }
    }

?>