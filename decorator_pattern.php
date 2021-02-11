<?php 

interface CarService {
	public function getCost();

	public function getDecription();
}

//core service
class BasicInspaction implements CarService {
	public function getCost()
	{
		return 19;
	}

	public function getDecription()
	{
		return 'Basic Inspaction';
	}
}

//decorator
class OilChange implements CarService {

	protected $carService;

	function __construct(CarService $carService)
	{
		$this->carService = $carService;	
	}

	public function getCost()
	{
		return 20 + $this->carService->getCost();
	}

	public function getDecription()
	{
		return $this->carService->getDecription() . ', and oil change';
	}
}

class TireRotation implements CarService{

	protected $carService;

	function __construct(CarService $carService)
	{
		$this->carService = $carService;
	}

	public function getCost()
	{
		return 15 + $this->carService->getCost();
	}

	public function getDecription()
	{
		return $this->carService->getDecription() . ', and tire rotation';
	}
}

$service = (new TireRotation(new OilChange(new BasicInspaction)));

echo $service->getDecription();

$cost = (new TireRotation(new OilChange(new BasicInspaction)));

echo $service->getCost();
