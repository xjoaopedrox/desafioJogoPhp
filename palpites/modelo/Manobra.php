<?php

class Manobra
{
    private $nome;
    private $midia;
    private $dica;

    public function __construct($nome, $midia, $dica)
    {
        $this->nome = $nome;
        $this->midia = $midia;
        $this->dica = $dica;
    }


    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of midia
     */
    public function getMidia()
    {
        return $this->midia;
    }

    /**
     * Set the value of midia
     */
    public function setMidia($midia): self
    {
        $this->midia = $midia;

        return $this;
    }

    /**
     * Get the value of dica
     */
    public function getDica()
    {
        return $this->dica;
    }

    /**
     * Set the value of dica
     */
    public function setDica($dica): self
    {
        $this->dica = $dica;

        return $this;
    }
}
