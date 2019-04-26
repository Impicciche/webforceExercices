<?php

class GrandMother
{
	private $age;
	
	public function __construct(int $age)
	{
		$this->age = $age;
	}
	
	public function seayHello()
	{
		echo 'Good morning';
	}
	
	private function thisIsMineDontTouch()
	{}
	
	protected function canTouchIt()
	{
	}
}
$momy = new GrandMother(75);

class Mother extends GrandMother
{
	public function seayHello()
	{
		echo 'Hi';
	}
	
	protected function canTouchIt()
	{
		say 'Helloo';
	}
}

class Daughter extends Mother
{
	public function seayHello()
	{
		parent::seayHello();
	}
	
	protected function canTouchIt()
	{
		say 'Helloo';
	}
}