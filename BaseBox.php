<?php

abstract class BaseBox implements BoxInterface
{
    protected array $fruit = [];
    protected int $maxCapacity = 1;

    public function add(Fruit $fruit): void {
        if (count($this->fruit)<$this->maxCapacity) {
            $this->fruit[] = $fruit;
        }else{
            throw new OverflowException("Cannot add more fruits.");
        }

    }
    public function getMaxCapacity(): int{
        return $this->maxCapacity;
    }
    public function setMaxCapacity(int $maxCapacity): void{
        $this->maxCapacity = $maxCapacity;
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

    public function getFruitAt(int $index): Fruit
    {
        if ($index < 0 || $index >= count($this->fruit)) {
            throw new OutOfBoundsException("No fruit at index $index");
        }
        return $this->fruit[$index];
    }
}