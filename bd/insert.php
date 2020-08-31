<?php
    include_once 'conexao.php';
    include_once '../libmail/PHPMailer.php';
    include_once '../libmail/Exception.php';
    include_once '../libmail/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

        $nome = $_POST['nome'];
        $cep = $_POST['cep'];
        $estado = $_POST['uf'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $logradouro = $_POST['logradouro'];
        $numero = $_POST['numero'];
        $compl = $_POST['complemento'];
        $fone = $_POST['fone'];
        $pedido = $_POST['areaPedido'];
        $ip = $_POST['ip'];

        
            $sql = "INSERT INTO pedido (nome,cep,estado,cidade,bairro,logradouro,
            complemento,numero,telefone,solicitacao,ip) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            try{
                $inserir = $conectar->prepare($sql);
                $inserir->bindValue(1,$nome);
                $inserir->bindValue(2,$cep);
                $inserir->bindValue(3,$estado);
                $inserir->bindValue(4,$cidade);
                $inserir->bindValue(5,$bairro);
                $inserir->bindValue(6,$logradouro);
                $inserir->bindValue(7,$compl);
                $inserir->bindValue(8,$numero);
                $inserir->bindValue(9,$fone);
                $inserir->bindValue(10,$pedido);
                $inserir->bindValue(11,$ip);
                $inserir->execute();

                try {
                    $email = new PHPMailer(true);
        
                    $email->SMTPDebug = SMTP::DEBUG_SERVER;
                    $email->isSMTP();
                    $email->Host = 'smtp.gmail.com';
                    $email->SMTPAuth = true;
                    $email->Username = 'sistematopicos@gmail.com';
                    $email->Password = 'sistematopicos2019';
                    $email->Port = 587;
        
                    $email->setFrom('sistematopicos@gmail.com');
                    $email->addAddress('mat358591@gmail.com');
        
                    $email->isHTML(true);
                    $email->Subject = 'Novo pedido';
                    $email->Body = "um novo pedido foi realizado no seu site com o ip: '$ip'";
                    $email->AltBody = "um novo pedido foi realizado no seu site com o ip: '$ip'";
        
                    $email->send();
                    
                  } catch (Exception $e) {
                    echo "erro ao enviar email {$email->ErrorInfo}";
                  }
                  
            }catch(PDOException $e){
                echo "{$e->ErrorInfo}";
            }
        
?>