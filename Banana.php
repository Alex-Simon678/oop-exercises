<?php

class Banana extends Fruit implements Peelable
{

    public function peel(): void
    {
        echo "Banana peeled";
    }
    public function isExotic(): bool
    {
        return false;
    }
}