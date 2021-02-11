<?php

abstract class HomeChecker {

	protected $successor;

	public abstract function check(HomeStatus $home);

	public function succedWith(HomeChecker $successor)
	{
		$this->successor = $successor;
	}

	public function next(HomeStatus $home)
	{
		if($this->successor)
		{
			$this->successor->check($home);
		}
	}
}

class Locks extends HomeChecker {

	public function check(HomeStatus $home)
	{
		if(!$home->locked)
		{
			throw new Exception('The doors are not locked!! Abort abort.');
		}

		$this->next($home);

	}

}

class Light extends HomeChecker {
	
	public function check(HomeStatus $home)
	{
		if(!$home->lightOff)
		{
			throw new Exception('The Lights are still On!! Abort abort.');
		}

		$this->next($home);

	}

}

class Alarm extends HomeChecker {

	public function check(HomeStatus $home)
	{
		if(!$home->alarmOn)
		{
			throw new Exception('The Alarm has not been set!! Abort abort.');
		}

		$this->next($home);

	}
}

class HomeStatus {

	public $alarmOn = true;

	public $locked = true;

	public $lightOff = true;
}


$locaks = new Locks;
$light = new Light;
$alarm = new Alarm;

$locaks->succedWith($light);
$light->succedWith($alarm);

$locaks->check(new HomeStatus);