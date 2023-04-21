<?php

namespace App;

class CryptoCurrency
{
    private string $name;
    private string $symbol;
    private float $price;

    public function __construct
    (
        string $name,
        string $symbol,
        float $price
    )
    {
        $this->name = $name;
        $this->symbol = $symbol;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSymbol()
    {
        return $this->symbol;
    }

    public function getPrice()
    {
        return $this->price;
    }
}