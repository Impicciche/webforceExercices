<?php

interface QueueInterface
{
    public const ARRAY_ASSOC = 1;
    public const ARRAY_NUMERIC = 2;

    public function toArray() : array;
}

class Queue implements QueueInterface
{
    private $elements = [];

    public function addElement($element) : QueueInterface
    {
        $this->elements[] = $element;
        return $this;
    }

    public function toArray(): array
    {
        return $this->elements;
    }
}

$stringQueue = new Queue();
$stringQueue->addElement('hello');
$stringQueue->addElement('the');
$stringQueue->addElement('world');

($stringQueue instanceof Queue) === true;
($stringQueue instanceof QueueInterface) === true;

var_dump($stringQueue->toArray());