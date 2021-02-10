<?php

namespace MyApp;

//we translate this class method to use Kindle interface.
class KindleAdapter implements BookInterface {

	private $kindle;

	public function __construct($kindle)
	{
		$this->kindle = $kindle;
	}

	public function open()
	{
		return $this->kindle->turnOn();
	}

	public function turnPage()
	{
		return $this->kindle->pressNextButton();
	}
}