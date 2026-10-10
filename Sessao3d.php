<?php



interface IAdicional {

    public function valorAdicional($valor);
    public function aplicarValorAdicional($valor);
}

class Sessao3D extends Filme implements IAdicional {
    public $taxa3d; 
    public function __construct($titulo, $classificacao, $taxa3d) {
    parent::__construct($titulo, $classificacao);

    }
    public function informacao() {
        echo  "<h2>Seguem as informações do filme:<h2>
            <p>É um filme 3D.</p> 
            <p>O cinema é: {$this->cinema()}<p>
           <p>O filme é: {$this->titulo}<p>
            <p>Com o valor: {$this->getValor()}<p>    
            ";
    }
public function valorAdicional($valor){
    $this->taxa3d = $valor;
    return $valor;
    }
    public function aplicarValorAdicional($valor){
    $this->valor = $this->taxa3d + $valor;
    return $this->valor;
    }    
}

?>