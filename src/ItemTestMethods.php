<?php

class ItemTestMethods
{
    public function getDescription()
    {
        return $this->getId() . $this->getToken();
    }

    //Para testar esse métodos foi criada a class ItemChild.
    //A mesma herda dessa classe. Essa e uma forma de testar métodos protegidos.
    protected function getId()
    {
        return rand();
    }

    //Para realizar um teste em métodos privados, é necessário usar Reflection(PHP documentation)
    private function getToken()
    {
        return uniqid();
    }

    private function getPrefixedToken(string $prefix)
    {
        return uniqid($prefix);
    }
}
