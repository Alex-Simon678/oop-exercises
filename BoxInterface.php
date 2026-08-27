<?php

interface BoxInterface
{
    public function add(Fruit  $fruit): void;
    public function empty(): void;
    public function getFruits(): array;
    public function getCount(): int;
    public function getTotalCalories():int;
    public function getFruitByColor(string $colour):array;
    public function getFruitAt(int $index):Fruit;
}