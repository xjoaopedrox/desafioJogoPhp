<?php

class Pokemon
{
    public $nome;
    public $tipo;
    public $experiencia;
    public $vida;
    public $forca;
    public $nivel; 

    function __construct($nome, $tipo, $experiencia, $vida, $forca)
    {
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->experiencia = $experiencia;
        $this->vida = $vida;
        $this->forca = $forca;
        $this->nivel = 1; 
    }

    public function batalhar()
    {
        $venceu = mt_rand(1, 100) >= 50;

        if ($venceu) {
            echo "O {$this->nome} venceu a batalha... +20 XP \n";
            $this->ganharExperiencia(20);
        } else {
            echo "O {$this->nome} perdeu a batalha...\n";
        }
    }

    public function ganharExperiencia($pontos)
    {
        $this->experiencia += $pontos;

        if ($this->experiencia >= 100) {
            $this->subirDeNivel();
            $this->experiencia = 0; 
        }
    }

    public function subirDeNivel()
    {
        $this->nivel++;
        $this->vida += 10;  
        $this->forca += 5;  

        echo "Parabens {$this->nome} subiu para o nivel {$this->nivel}\n";
        echo "Vida atual: {$this->vida}\n  Forca atual: {$this->forca}";
    }
}




