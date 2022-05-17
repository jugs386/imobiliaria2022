<?php
require_once 'head.php';
require_once 'controller/UsuarioController.php';

if(isset($_GET['action'])){

    if($_GET['action'] == 'editar'){
        $usuario = call_user_func(array('UsuarioController','editar'),$_GET['id']);
        require_once 'view/cadUsuario.php';
    }

    if($_GET['action'] == 'listar'){
        require_once 'view/listUsuario.php';
    }

    if($_GET['action'] == 'excluir'){
        $usuario = call_user_func(array('UsuarioController','excluir'),$_GET['id']);
        require_once 'view/listUsuario.php';
    }
}else{
    require_once 'view/cadUsuario.php';
}


require_once 'foot.php';

?>