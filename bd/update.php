<?php
    include_once 'conexao.php';

        if (isset($_POST['id']) && isset($_POST['situacao'])) {
            $id = $_POST['id'];
            $situacao = $_POST['situacao'];

            if ($situacao === "pendente") {
                $sql = "UPDATE pedido SET situacao = 'pendente' WHERE id = ?";
                try {
                    $alterar = $conectar->prepare($sql);
                    $alterar->bindValue(1,$id);
                    $alterar->execute();
                } catch (PDOException $e) {
                    $e->getMessage();
                }
            }
             else if ($situacao === "concluido") {
                 $sql = "UPDATE pedido SET situacao = 'concluído' WHERE id = ?";
                try {
                     $alterar = $conectar->prepare($sql);
                     $alterar->bindValue(1,$id);
                     $alterar->execute();
                 } catch (PDOException $e) {
                     $e->getMessage();
                 }
             }
        }

?>