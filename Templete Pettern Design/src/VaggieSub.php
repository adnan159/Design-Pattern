<?php

namespace App;

class VaggieSub extends Sub {

	public function addPrimaryToppings()
	{
		var_dump('add some Vaggies');

		return $this;
	}

}