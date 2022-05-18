<?php
ob_start();
require_once 'head.php';
require_once 'controller/ImovelController.php';
?>

<div class="container">
        <form name="cadUsuario" id="cadUsuario" action="" method="post">
            <div class="card" style="top:40px">
                <div class="card-header">
                    <span class="card-title">Imovéis</span>
                </div>
                <div class="card-body">
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Descricao:</label>
                    <input type="text" class="form-control col-sm-8" name="descricao" id="descricao" value="<?php echo isset($imovel)?$imovel->getDescricao():''; ?>" />
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Foto:</label>
                    <input type="text" class="form-control col-sm-8" name="foto" id="foto" value="<?php echo isset($imovel)?$imovel->getFoto():''; ?>" />
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Valor:</label>
                    <input type="text" class="form-control col-sm-8" name="valor" id="valor" value="<?php echo isset($imovel)?$imovel->getValor():''; ?>" />
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Tipo:</label>
                    <select name="tipo" id="tipo" class="form-control col-sm-8">
                        <option value="0">**SELECIONE**</option>
                        <option value="C" <?php echo isset($imovel) && $imovel->getTipo() == 'C'?'selected':'';  ?>>Casa Terrea</option>
                        <option value="S" <?php echo isset($imovel) && $imovel->getTipo() == 'S'?'selected':'';  ?>>Sobrado</option>
                        <option value="T" <?php echo isset($imovel) && $imovel->getTipo() == 'T'?'selected':'';  ?>>Terreno</option>
                        <option value="H" <?php echo isset($imovel) && $imovel->getTipo() == 'H'?'selected':'';  ?>>Chacara</option>
                    </select>
                </div>
                <div class="card-footer">
                    <input type="hidden" name="id" id="id" value="<?php echo isset($imovel)?$imovel->getId():''; ?>" />
                    <input type="submit" class="btn btn-success" name="btnSalvar" id="btnSalvar">
                </div>
            </div>
        </form>
    </div>
<?php

    if(isset($_POST['btnSalvar'])){
        call_user_func(array('ImovelController','salvar'));
        header('Location: index.php?page=imovel&action=listar');
    }
    require_once 'foot.php';
    ob_end_flush();
?>
