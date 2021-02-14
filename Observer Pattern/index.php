<?php 

//like publisher
interface Subject {
	public function attach($observable);
	public function detach($observer);
	public function notify();

}

//like subscriber
interface Observer{
	public function handle();

}

class Login implements Subject {

	protected $observers = [];

	public function attach($observable)
	{

		if(is_array($observable))
		{
			return $this->attachObservers($observable);
		}

		$this->observers[] = $observable;

		return $this;
	}

	public function detach($index)
	{
		unset($this->observers[$index]);
	}

	public function notify()
	{
		foreach ($this->observers as $observer) {
			$observer->handle();
		}
	}

	public function fire()
	{
		$this->notify();
	}

	private function attachObservers($observable)
	{
		foreach ($observable as $observer) {
			
			if(!$observer instanceof Observer)
			{
				throw new Exception;
			}

			$this->attach($observer);
		}
	}

}

class LogHandler implements Observer {

	public function handle()
	{
		var_dump('log somethig important');
	} 
}

class EmailNotifire implements Observer {

	public function handle()
	{
		var_dump('fire off an email');
	}
}

class LoginRepoter implements Observer{

	public function handle()
	{
		var_dump('Something New');
	}
}

$login = new Login;
$login->attach([
	new LogHandler,
	new EmailNotifire,
	new LoginRepoter
]);

$login->fire(); 