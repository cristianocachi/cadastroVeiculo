<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Veículos</title>
    </head>
    <body>
        <?php
        require_once 'conexao.php';
        $conexao = new Conexao('localhost', 'cad_veiculos', 'root', '', 3306);
        $dados = array('cad_modelo' => $_POST['cad_modelo'], 'cad_marca' => $_POST['cad_marca'], 'cad_nome' => $_POST['cad_nome'], 'cad_potmotor' => $_POST['cad_potmotor'], 'cad_cor' => $_POST['cad_cor']);
        $insert = $conexao->insert('veiculos', $dados);
        echo "Cadastro com Sucesso!";
        ?>

        <form action="listagemveiculos.php" method="get">
            <input type="submit" name="submit" value="Voltar" />
        </form>
    </body>
</html>
