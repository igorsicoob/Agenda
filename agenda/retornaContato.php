<?php
    $mysqli = new MySQLi('127.0.0.1','root','','') or die("Problemas de conexão!");

    $sql = $mysqli->prepare(" SELECT C.nomContato, C.telContato, C.emailContato, C.observacoes
                              FROM contato C
                              WHERE C.nomContato LIKE "%$nome_%" ");
    $sql->bind_param('d',$id);
    if(!$sql->execute()){
    echo $sql->error;
    exit;}
    $sql->bind_result($nome_,$tel_,$email_,$obs_);
    $sql->fetch();
    $sql->close();     
?>
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Agenda</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <br>
        <div class = "container">
            <form action="deletaContato.php" method="POST">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Ex.: João da Silva Sauro">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Telefone</label>
                    <input type="phone" class="form-control" name="telefone" id="telefone" placeholder="Ex.: (71)99999-9999">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">E-mail</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="nome@exemplo.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Observações</label>
                    <textarea class="form-control" name="obs" id="observacoes" rows="3"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Editar</button>
                <button class="btn btn-primary" onclick="<?php deletaContato($id)?>">Deletar</button>
            </form>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>