<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body><div class="container">
<form name="cadUsuario" id="cadUsuario" action="" method="post">
  <div class="row">
    <div class="col-12">
        <div class="col-3">
            <label>Usuário</label>
            <input type="text" name="login" id="login" value=""/>
        </div>
        <div class="col-9">
            &nbsp;
        </div>
    </div>
    <div class="col-12">
        <div class="col-3">
            <label>Senha:</label>
            <input type="password" name="senha1" id="senha1" value=""/>
        </div>
        <div class="col-3">
            <label>Confirmar Senha:</label>
            <input type="password" name="senha2" id="senha2" value=""/>
        </div>
        <div class="col-6">
            &nbsp;
        </div>
    </div>
    <div class="col-12">
        <div class="col-3">
            <label>Permissão: </label>
            <select name="permissao" id="permissao">
                <option value="0">***SELECIONE***</option>
                <option value="A">Administrador</option>
                <option value="C">Comum</option>
            </select>
        </div>
        <div class="col-9">
            &nbsp;
        </div>
    </div>
    <div class="col-12">
        <div class="col-3">
            <input type="submit" name="btnCadastrar" id="btnCadastrar" value="Cadastrar"/>
        </div>
        <div class="col-9">
            &nbsp;
        </div>
    </div>
  </div>
  </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php

    if(isset($_POST['btnCadastrar'])){

        require_once '../controller/UsuarioController.php';
        call_user_func(array('UsuarioController','salvar'));
    }

?>
