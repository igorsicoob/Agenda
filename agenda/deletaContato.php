<?php
  $mysql = new MySQLi ('127.0.0.1','root','','') or die ("Problema de conexão!");

  $id = $_GET['id'];

  $a = $mysql->prepare('DELETE FROM agenda.contato WHERE idContato = ?')
  $a->bind_param('d',$id);
  if(!$a->execute()){
      echo $mysqli->error;
  }
  $id = $a->insert_id;
  $a->close();

  header("Location: editaContato.php?id=".$id);
?>