<?php
    try {
        $conectar = new PDO("mysql:host=localhost;charset=utf8;dbname=banco17-04","root","1234");
        } catch (PDOException $erro) {
            $erro.getMessage();
            echo "Erro ao conectar com o banco de dados";
    } catch(Exception $e){
        echo "houve um erro durante a conexão";
    }
?>