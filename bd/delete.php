<?php
    include_once 'conexao.php';

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM pedido WHERE id = ?";
        try {
            $apagar = $conectar->prepare($sql);
            $apagar->bindValue(1,$id);
            $apagar->execute();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
?>