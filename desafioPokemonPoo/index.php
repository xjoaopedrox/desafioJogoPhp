<?php
require_once("Modelo/Pokemon.php");


$pokemon1 = new Pokemon("Charmander", "Fogo", 80, 50, 15);
$pokemon2 = new Pokemon("Squirtle", "Água", 70, 60, 12);

echo "POKÉMON 1\n";
$pokemon1->mostrarDados();
$pokemon1->batalhar();

echo "\nPOKÉMON 2\n";
$pokemon2->mostrarDados();
$pokemon2->batalhar();
