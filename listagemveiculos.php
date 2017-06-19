<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cadastro de Veículos</title>
    </head>
    <body>
        <form action="cad_veiculos.php" method="get">
            <input type="submit" name="submit" value="Novo Veículo">
        </form>
        <?php
        require_once 'conexao.php';
        $conexao = new Conexao('localhost', 'cad_veiculos', 'root', '', 3306);
        $select = $conexao->select('veiculos');
        echo "<table><tr><td>ID</td><td>MODELO</td><td>MARCA</td><td>NOME</td><td>POT. MOTOR</td><td>COR</td><td>EDITAR</td><td>DELETAR</td></tr>";

        foreach ($select as $value) {
            echo "<tr>";
            echo "<td>";
            echo $value['id'];
            echo "</td>";
            echo "<td>";
            echo $value['cad_modelo'];
            echo "</td>";
            echo "<td>";
            echo $value['cad_marca'];
            echo "</td>";
            echo "<td>";
            echo $value['cad_nome'];
            echo "</td>";
            echo "<td>";
            echo $value['cad_potmotor'];
            echo "</td>";
            echo "<td>";
            echo $value['cad_cor'];
            echo "</td>";
            echo "<td>";
            echo "<a href='cad_veiculos.php?id={$value["id"]}&cad_modelo={$value["cad_modelo"]}&cad_marca={$value["cad_marca"]}&cad_nome={$value["cad_nome"]}&cad_potmotor={$value["cad_potmotor"]}&cad_cor{$value["cad_cor"]}'>Editar</a>";
            echo "</td>";
            echo "<td>";
            echo "<a onClick=\"javascript: return confirm('Deseja realmente apagar este registro?');\" href='listagemveiculos.php?id={$value["id"]}'>Apagar</a>";
            echo "</td>";
            echo "</tr>";
			
        }
        echo "</Table>";
        if (isset($_GET['id'])) {
            deletar($_GET['id']);
        }

        function deletar($id) {
            $conexao = new Conexao('localhost', 'cad_veiculos', 'root', '', 3306);
            $conexao->delete('id', $id, 'veiculos');
            header("Location: listagemveiculos.php");
        }
        ?>
    </body>
</html>
