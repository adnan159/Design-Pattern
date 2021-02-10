<?php

//namespace use for grouping class 
//which are use for same type of task
namespace MyApp;

class Book implements BookInterface {
	
	public function open()
	{
		var_dump("Opening the Paper Book");
	}

	public function turnPage()
	{
		var_dump("Turn the page of paper Book");
	}
}
