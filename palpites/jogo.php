<?php
session_start();
require_once('modelo/Manobra.php');

$m1 = new Manobra("Pop Shove It", "https://nollieskateboarding.com/wp-content/uploads/2021/05/pop_07.gif", "O skate vira 180 graus, trocando a base do skate");
$m2 = new Manobra("Heelflip", "https://nollieskateboarding.com/wp-content/uploads/2021/05/hf5.gif", "O giro é feito com o calcanhar para fora.");
$m3 = new Manobra("Kickflip", "https://www.skatedeluxe.com/blog/wp-content/uploads/2016/09/trick-tip-kickflip-13.jpg", "O skatista chuta o skate para girar para dentro.");
$m4 = new Manobra("Ollie", "https://nollieskateboarding.com/wp-content/uploads/2021/05/ollie.gif", "A manobra base: saltar com o skate grudado nos pés.");
$m5 = new Manobra("Hardflip", "https://nollieskateboarding.com/wp-content/uploads/2021/05/hardflip.gif", "Uma combinação complexa de Frontside Shove-it com Kickflip.");
$m6 = new Manobra("Varial Kickflip", "https://nollieskateboarding.com/wp-content/uploads/2021/05/varial_flip.gif", "O skate gira um 180 shove-it e um flip ao mesmo tempo.");

$catalogo = [
    1 => $m1,
    2 => $m2,
    3 => $m3,
    4 => $m4,
    5 => $m5,
    6 => $m6
];

if (!isset($_SESSION['chave_aleatoria'])) {
    $_SESSION['chave_aleatoria'] = array_rand($catalogo);
}

// Mantendo sua linha: sorteia a exibição atual
$chaveAleatoria = $_SESSION['chave_aleatoria']; 
$manobraAleatoria = $catalogo[$chaveAleatoria];

echo "<h1>Adivinhe a Manobra!</h1>";
echo "<h3>Dica: " . $manobraAleatoria->getDica() . "</h3>";

echo "<hr>";
echo "<strong>Escolha uma opção:</strong><br>";
echo "1 - Pop Shove It<br>";
echo "2 - Heelflip<br>";
echo "3 - Kickflip<br>";
echo "4 - Ollie<br>";
echo "5 - Hardflip<br>";
echo "6 - Varial Kickflip<br>";
echo "<hr>";

echo "
<form action='jogo.php' method='get'>
    <input type='text' name='palpite' placeholder='Digite seu palpite'>
    <input type='submit' value='Enviar'>
</form>
<br>
<a href='?nova=1'>Sortear nova manobra</a><br><br>
";

$palpiteUsuario = $_GET['palpite'] ?? null;

if ($palpiteUsuario !== null && $palpiteUsuario !== "") {
    echo match (true) {
        (int)$palpiteUsuario === $chaveAleatoria
        => "O seu point ta daora... Você acertou: " . $manobraAleatoria->getNome() .
            "<br><img src='{$manobraAleatoria->getMidia()}' width='300'>",

        default
        => "Vacilou po. A manobra correta era a de número " . $chaveAleatoria,
    };
}

if (isset($_GET['nova'])) {
    unset($_SESSION['chave_aleatoria']);
    header('Location: jogo.php');
    exit;
}