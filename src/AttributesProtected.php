<?php

class AttributesProtected
{
    protected int $product_id;

    public function __construct()
    {
        $this->product_id = rand();
    }

    //Utilizaremos reflaction para testar atributos protegidos.
}
