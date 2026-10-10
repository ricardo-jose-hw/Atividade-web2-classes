<?php
 class Filme {
    static public function cinema() {
        echo "<h1> Cinema: Martins</h1>";
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
        return $this->valor = $valor;
    }

    
    public function informacao() {
        echo "<h2>Seguem as informações do filme:</h2> 
           <p>O filme é: <strong>{$this->titulo}</strong></p>
            <p>Com o valor: <i>{$this->getValor()}</i></p>    
            ";
    }
    


}



?>