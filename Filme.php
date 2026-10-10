<?php
 class Filme {
    static public function cinema() {
        echo "Martins";
    }


    public $titulo;
    protected $valor;

    public $classificacao;
    public function __construct( $titulo, $classificacao) {
        $this->titulo = $titulo;
        $this->classificacao = $classificacao;
        
        }

    public function getValor() {
        return $this->valor;
    }
    public function setValor($valor) {
        $this->valor = $valor;
    }

    
    public function informacao() {
        echo "<h2>Seguem as informações do filme:<h2> 
            <p>O cinema é: {$this->cinema()}<p>
           <p>O filme é: {$this->titulo}<p>
            <p>Com o valor: {$this->getValor()}<p>    
            ";
    }
    


}