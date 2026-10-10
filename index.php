<?php
include("Filme.php");
include("Sessao3d.php");


$filme1 = new Filme("O Ataque da Serra Elétrica",  "14 anos");

$filme1->setValor(25);


echo "<p>{$filme1->informacao()}</p>";
 ?>