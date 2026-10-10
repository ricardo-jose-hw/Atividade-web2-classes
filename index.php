<?php
include("Filme.php");
include("Sessao3d.php");


$filme1 = new Filme("O Ataque da Serra Elétrica",  "14 anos");

$filme1->setValor(25);


echo "<p>{$filme1->informacao()}</p>";

$filme3d = new Sessao3d("O Ataque da Serra Elétrica 3D", "16 anos", 5);
$filme3d->valorAdicional(5);
$filme3d->aplicarValorAdicional(5);
echo $filme3d->informacao();
 ?>