<?php

class Exotic extends BaseBox
{

    public function add(Fruit $fruit): void{
        if (!$fruit->isExotic()) {
            throw new InvalidArgumentException("Only exotic fruits can be added to this box.");
        }
        parent::add($fruit);
    }
}