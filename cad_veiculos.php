<?php
require_once 'conexao.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $cad_modelo = $_GET["cad_modelo"];
    $cad_marca = $_GET["cad_marca"];
    $cad_nome = $_GET["cad_nome"];
    $cad_potmotor = $_GET["cad_potmotor"];
    $cad_cor = $_GET["cad_cor"];
    
} else {
    $id = "";
    $cad_modelo = "";
    $cad_marca = "";
    $cad_nome = "";
    $cad_potmotor = "";
    $cad_cor = "";
}

if (isset($_POST['id']) && isset($_POST['cad_marca'])) {
    if ($_POST['id'] !== '') {
        atualizar($_POST['id'], $_POST['cad_modelo'], $_POST['cad_marca'], $_POST['cad_nome'], $_POST['cad_potmotor'], $_POST['cad_cor']);
    } else {
        salvar($_POST['id'], $_POST['cad_modelo'], $_POST['cad_marca'], $_POST['cad_nome'], $_POST['cad_potmotor'], $_POST['cad_cor']);
    }
}

function salvar($cad_modelo, $cad_marca, $cad_nome, $cad_potmotor, $cad_cor) {
    $conexao = new Conexao('localhost', 'cad_veiculos', 'root', '', 3306);
    $dados = array('cad_modelo' => $cad_modelo, 'cad_marca' => $cad_marca, 'cad_nome' => $cad_nome, 'cad_potmotor' => $cad_potmotor, 'cad_cor' => $cad_cor);
    $insert = $conexao->insert('veiculos', $dados);
    header("Location: listagemveiculos.php");
}

function atualizar($id, $cad_modelo, $cad_marca, $cad_nome, $cad_potmotor, $cad_cor) {
    $conexao = new Conexao('localhost', 'cad_veiculos', 'root', '', 3306);
    $dados = array('cad_modelo' => $cad_modelo, 'cad_marca' => $cad_marca, 'cad_nome' => $cad_nome, 'cad_potmotor' => $cad_potmotor, 'cad_cor' => $cad_cor);
    $insert = $conexao->update('veiculos','id',$id, $dados);
    header("Location: listagemveiculos.php");
}
?>

        <form action="" method="post">
            Id:  <input type="text" name="id" readonly="true" value="<?php echo $id; ?>"/><br />
            Modelo: <input type="text" name="cad_modelo" value="<?php echo $cad_modelo; ?>"/><br /><br />
            Marca: <input type="text" name="cad_marca" value="<?php echo $cad_marca; ?>"/><br/><br />
            Nome: <input type="text" name="cad_nome" value="<?php echo $cad_nome; ?>"/><br/><br />
            Potencia: <input type="text" name="cad_potmotor" value="<?php echo $cad_potmotor; ?>"/><br/><br />
            Cor: <input type="text" name="cad_cor" value="<?php echo $cad_cor; ?>"/><br/><br />
            <input type="submit" name="submit" value="Salvar" />
        </form>
