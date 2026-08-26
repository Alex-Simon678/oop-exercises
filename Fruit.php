<?php
abstract class Fruit
{
    public function __construct(protected readonly float $size, protected readonly string $color, protected readonly int $calorie){}

    public function getSize(): float
    {
        return $this->size;
    }
    public function getColor(): string
    {
        return $this->color;
    }
    public function getCalorie(): int
    {
        return $this->calorie;
    }

}