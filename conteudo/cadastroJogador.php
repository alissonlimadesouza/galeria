<!--
Cadastro de jogadores
-->
<form id="frmJogador" name="frmJogador" method="post" action="./servicos/cadastrarJogador.php">
    nome<input type="text" name="nome" id="nome">
    rg<input type="text" name="rg">
    idade<input type="date" name="nascimento">
    <button type="button" onclick="validaCamposJogadores('frmJogador')">salvar</button>
</form>

<!--
Fim de cadastro
-->


<!--
Inicio de edição e exclusão de jogadores
-->



<p>Nome Dos Jogadores</p>
<div>
    <?php
    $listar = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
    $listar->conectar();


    $consulta = "select * from jogadores";
    $contagem = $listar->contaOcorrencias($consulta);
    $id = $listar->listaOcorrencia($consulta, 'idJogador');
    $jogadores = $listar->listaOcorrencia($consulta, 'nomeJogador');
    $rg = $listar->listaOcorrencia($consulta, 'rgJogador');
    $nascimento = $listar->listaOcorrencia($consulta, 'idadeJogador');
    ?>



    <?php
    for ($i = 0; $i < $contagem; $i++) {
        ?>
        <form method="post" action="./servicos/editarJogador.php">
            <table>
                <tr>
                    <td><input readonly="" type="text" name="id" value="<?php echo $id[$i]; ?>"</td>
                    <td><input type="text" name="nome" value="<?php echo $jogadores[$i]; ?>"></td>
                    <td><input type="text" name="rg" value="<?php echo $rg[$i]; ?>"></td>
                    <td><input type="date" name="nascimento" value="<?php echo $nascimento[$i]; ?>"></td>


                    <td><button>editar</button></td>
                    <td><button name="excluir" value="1">excluir</button></td>
                </tr>
            </table>
        </form>
        <?php
    }
    ?>



</div>
<!--
Fim da edita e exclui jogadores
-->




<div>

    <?php
    if (isset($_GET['mensagem'])) {

        if ($_GET['mensagem'] == 1) {
            echo 'Cadastro realizado';
        } elseif ($_GET['mensagem'] == 2) {
            echo 'Cadastro não realizado';
        } elseif ($_GET['mensagem'] == 3) {
            echo 'Cadastro não realizado cpf já utilizado no sistema';
        }
    }
    ?>
</div>
</div>