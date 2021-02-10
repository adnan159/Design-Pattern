<?php

//singleton

class SomeClass {
	static $instance;
	private $name;

    function __construct($name){
    	echo "New Instance Created";
	}

	static function getInstance($name) {
		if(!self::$instance){
			self::$instance = new SomeClass($name);
		}else{
			echo "Old Instace Supplied";
		}

		return self::$instance;
	}

	function sayName(){
		echo $this->name;
	}
}

$sc1 = SomeClass::getInstance("New");
$sc2 = SomeClass::getInstance("new");

$sc1->sayName();
$sc2->sayName();