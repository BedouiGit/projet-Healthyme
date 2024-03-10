<?php
class exercice
{
    private ?int $ide = null;
    private ?string $nomEx = null;
    private ?string $categorie = null;
    //private ?DateTime $dob = null;

    public function __construct($id = null, $n, $c)
    {
        $this->ide = $id;
        $this->nomEx = $n;
        $this->categorie = $c;
        
        //$this->dob = $d;
    }

    /**
     * Get the value of idExercice
     */
    public function getidExercice()
    {
        return $this->ide;
    }

    /**
     * Get the value of nomEX
     */
    public function getnomEx()
    {
        return $this->nomEx;
    }

    /**
     * Set the value of nomEX
     *
     * @return  self
     */
    public function setnomEX($nomEX)
    {
        $this->nomEX = $nomEX;

        return $this;
    }

    /**
     * Get the value of categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     *
     * @return  self
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }
}
