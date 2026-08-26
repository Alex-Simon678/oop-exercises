<?php

class Apple extends Fruit implements Peelable
{
    public function peel(): void
    {
        echo "Apple peeled";
    }
}