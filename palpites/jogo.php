<?php

require_once("palpites/modelo/Manobra.php");


$m1 = new Manobra("Pop Shove It", "https://nollieskateboarding.com/wp-content/uploads/2021/05/pop_07.gif", "O skate vira 180 graus, trocando a base do skate");
$m2 = new Manobra("Heelflip", "https://nollieskateboarding.com/wp-content/uploads/2021/05/hf5.gif", "O giro é feito com o calcanhar para fora.");
$m3 = new Manobra("Kickflip", "https://nollieskateboarding.com/wp-content/uploads/2021/08/kickflip_angles.mp4", "O skatista chuta o skate para girar para dentro.");

$catalogo = [1 => $m1, 2 => $m2, 3 => $m3];

$chaveAleatoria = array_rand($catalogo);
$manobraAleatoria = $catalogo[$chaveAleatoria];


$palpiteUsuario = $_GET['palpite'] ?? null;

echo match (true) {
    $palpiteUsuario === null 
        => "erro: o palpite precisa estar na url",

    (int)$palpiteUsuario === $chaveAleatoria 
        => "O seu point ta daora... Você acertou: " . $manobraAleatoria->getNome() . 
           "<br><img src='{$manobraAleatoria->getMidia()}'>",

    default 
        => "Vacilou po. A manobra correta era a de número " . $chaveAleatoria,
};





/*PASSOS

criar objetos


sortear um dos objetos para ser o palpite correto

receber o palpite ($_GET) e mostrar se o usuario acertou ou errou


LÓGICOS

sistema de decisao
A -> acertou
B -> errou
C -> tente novamente

base palpite
link de imagem e nome




IDEIAS

utilizar match case(versao otimizada)
utilizar o mt_rand (randomizar com modernidade)
/*




