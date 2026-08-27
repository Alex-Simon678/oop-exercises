<?php

class Box implements BoxInterface
{
    private static ?Box $instance = null;
    private array $fruit;

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

    public function add(Fruit  $fruit): void{
        $this->fruit[] = $fruit;
    }

    public function empty(): void
    {
        $this->fruit = [];
    }
    public function getFruits(): array
    {
        return $this->fruit;
    }
    public function getCount(): int
    {
        return count($this->fruit);
        
    }
    public function getTotalCalories(): int
    {
        $totalCalories = 0;
        foreach ($this->fruit as $fruit) {
            $totalCalories += $fruit->getCalorie();
        }
        return $totalCalories;
    }
    public function getFruitByColor(string $colour): array
    {
        return array_values(array_filter(
            $this->fruit,
            fn(Fruit $fruit) => $fruit->getColor() === $colour
        ));
    }
    public function getFruitAt(int $index): Fruit{
        if ($index < 0 || $index >= count($this->fruit)) {
            throw new OutOfBoundsException("No fruit at index $index");
        }
        return $this->fruit[$index];
    }

}