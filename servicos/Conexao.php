
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexao
 *
 * @author Administrador
 */
class ConexaoProjeto {

    //put your code here


    private $_local;
    private $_senha;
    private $_usuario;
    private $_banco;

    function __construct($_local, $_senha, $_usuario, $_banco) {
        $this->_local = $_local;
        $this->_senha = $_senha;
        $this->_usuario = $_usuario;
        $this->_banco = $_banco;
    }

    function get_local() {
        return $this->_local;
    }

    function get_senha() {
        return $this->_senha;
    }

    function get_usuario() {
        return $this->_usuario;
    }

    function get_banco() {
        return $this->_banco;
    }

    function set_local($_local) {
        $this->_local = $_local;
    }

    function set_senha($_senha) {
        $this->_senha = $_senha;
    }

    function set_usuario($_usuario) {
        $this->_usuario = $_usuario;
    }

    function set_banco($_banco) {
        $this->_banco = $_banco;
    }

    public function conectar() {
        $link = mysqli_connect($this->_local, $this->_usuario, $this->_senha, $this->_banco);
        return $link;
    }

    public function verificaConexao() {

        if ($this->conectar()) {
            echo "OK";
        } else {
            echo 'Sem conexão';
        }
    }

    public function listaOcorrencia($consulta, $indice) {
        $query = mysqli_query($this->conectar(), $consulta);
        $ocorrencias = array();
        while ($row = mysqli_fetch_array($query)) {
            array_push($ocorrencias, $row[$indice]);
        }

        return $ocorrencias;
    }

    public function salvaOcorrencia($consulta) {
        $retorno = mysqli_query($this->conectar(), $consulta);
        return $retorno;
    }

    public function excluiOcorrencia($consulta) {
        mysqli_query($this->conectar(), $consulta);
    }

    public function contaOcorrencias($consulta) {
        $ocorrencia = mysqli_query($this->conectar(), $consulta);
        $contagem = mysqli_num_rows($ocorrencia);
        return $contagem;
    }

    public function fechaConexao() {
        $fechar = mysqli_close($this->conectar());
        return $fechar;
    }

    public function editarOcorrencia($consulta) {
        $retorno = mysqli_query($this->conectar(), $consulta);
        return $retorno;
    }

    /*  public function __destruct() {

      $fechar = $this->fechaConexao();

      return $fechar;
      } */
}
