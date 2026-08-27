<?php

class Box extends BaseBox
{
    private static ?Box $instance = null;

    private function __construct(){
        $this->fruit = [];
    }

    public static function getInstance(): static
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}