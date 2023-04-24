<?php
class recette
{
    private ?int $idr = null;
    private ?string $nom = null;
    private ?string $descriptionr = null;
    private ?string $instructions = null;
    private ?int $cooktime = null;
    

    public function __construct($idr = null, $n, $d, $i, $c)
    {
        $this->idr = $idr;
        $this->nom = $n;
        $this->descriptionr = $d;
        $this->instructions = $i;
        $this->cooktime = $c;
    }

    /**
     * Get the value of idClient
     */
    public function getidr()
    {
        return $this->idr;
    }

    /**
     * Get the value of lastName
     */
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getdescription()
    {
        return $this->descriptionr;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setdescription($descriptionr)
    {
        $this->descriptionr = $descriptionr;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getinstructions()
    {
        return $this->instructions;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setinstructions($instructions)
    {
        $this->instructions = $instructions;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getcooktime()
    {
        return $this->cooktime;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setcooktime($cooktime)
    {
        $this->cooktime = $cooktime;

        return $this;
    }
}
