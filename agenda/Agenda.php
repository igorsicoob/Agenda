<?php
    $mysqli = new MySQLi('127.0.0.1','root','','');
    if(!$mysqli){
        echo "Deconhecido! Erro: " .$mysqli->connect_error;
    }else{
        echo "Conectado!";
    }

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $obs = $_POST["obs"];

    $a = $mysqli->prepare('INSERT INTO agenda.contato(nomContato,telContato,emailContato,observacoes) VALUES (?,?,?,?)');
    $a->bind_param('ssss',$nome,$telefone,$email,$obs);
    if(!$a->execute()){
        echo $mysqli->error;
    }
    $id = $a->insert_id;
    $a->close();

    header("Location: editaContato.php?id=".$id);
?>