<?php
require_once 'head.php';
//importa o UsuarioController.php
require_once 'controller/ImovelController.php';
?>
<div class="container">

<h1>Imovéis</h1>
<hr>
<table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Descricao</th>
                <th>Foto</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th><a href="">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            //Chama uma função PHP que permite informar a classe e o Método que será acionado
            $imoveis = call_user_func(array('ImovelController','listar'));
            //Verifica se houve algum retorno
            if (isset($imoveis) && !empty($imoveis)) {
                foreach ($imoveis as $imovel) {
                    ?>
                    <tr>
                        <!-- Como o retorno é um objeto, devemos chamar os get para mostrar o resultado -->
                        <td><?php echo $imovel->getDescricao(); ?></td>
                        <td><?php echo $imovel->getFoto(); ?></td>
                        <td><?php echo ($imovel->getTipo() == 'C'?'Casa':
                                            ($imovel->getTipo() == 'A'?'Apartamento':
                                                ($imovel->getTipo() == 'S'?'Sobrado':'Chacara')));?></td>
                        <td><?php echo $imovel->getValor(); ?></td>
                        <td>
                            <a href="index.php?page=imovel&action=editar&id=<?php echo $imovel->getId(); ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="index.php?page=imovel&action=excluir&id=<?php echo $imovel->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="3">Nenhum registro encontrado</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
    require_once 'foot.php';
?>

