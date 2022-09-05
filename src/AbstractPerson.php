<?php

abstract class AbstractPerson
{
    //Para testar classes abstratas temos 2 formas.
    //Primeira-> criar uma classe que extenda a AbstractPerson. Nesse caso vamos criar a classe Doctor
    //Segunda -> Realizando MOCK da classe.
    
    protected string $surname;

    public function __construct(string $surname)
    {
        $this->surname = $surname;
    }

    abstract protected function getTitle();

    public function getNameAndTitle()
    {
        return $this->getTitle(). ' ' . $this->surname;
    }
}
