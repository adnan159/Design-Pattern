<?php 

namespace MyApp;

class Kindle implements eReaderInterface{

	public function turnOn()
	{
		var_dump("turn the kindle on");
	}

	public function pressNextButton()
	{
		var_dump("Press the Next Button on the Kindle");
	}
}