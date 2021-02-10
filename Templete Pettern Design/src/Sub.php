<?php

namespace App;

abstract class Sub {

	public function make()
	{
		return $this
			->layBread()
			->addLettuce()
			->addPrimaryToppings()
			->addVinegar();
	}

	protected function layBread()
	{
		var_dump('laying down the bread');

		return $this;
	}

	protected function addLettuce()
	{
		var_dump('add some lettuce');

		return $this;
	}

	protected function addVinegar()
	{
		var_dump('add some Vinegar');

		return $this;
	}

	protected abstract function addPrimaryToppings();
}