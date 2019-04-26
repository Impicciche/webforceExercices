<?php

abstract class AbstractAnimal
{
    public function feed($food)
    {
        echo 'I am happy...' . $this->speak();
    }

    protected abstract function speak() : string;
}

class Dog extends AbstractAnimal
{
    protected function speak(): string
    {
        return "Ouaf ouaf\n";
    }
}
class Bird extends AbstractAnimal
{
    protected function speak(): string
    {
        return "Puic puic\n";
    }
}
class Duck extends AbstractAnimal
{
    protected function speak(): string
    {
        return "Coin coin\n";
    }
}

(new Dog())->feed('Wurst');
(new Bird())->feed('Wurst');
(new Duck())->feed('Wurst');


















