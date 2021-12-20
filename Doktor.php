<?php

class Doktor
{
    public $id;
    public $ime;
    public $prezime;
    public $specijalizacija;
    public $ustanova_id;

    function __construct($id, $ime, $prezime, $specijalizacija, $ustanova_id)
    {
        $this->id = $id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->specijalizacija = $specijalizacija;
        $this->ustanova_id = $ustanova_id;
    }
}
