<?php

//encaptulate and make them interchangeable

interface Logger {
	public function log($data);
} 


//define a family of algorithms

class LogToFile implements Logger {

	public function log($data)
	{
		var_dump('Log the data to a file');
	}
}

class LogToDatabase implements Logger {

	public function log($data)
	{
		var_dump('Log the data to the Database');
	}
}

class LogToXWebService implements Logger {

	public function log($data)
	{
		var_dump('Log the data to a Saas site');
	}
}

class App {
	public function log($data, Logger $logger = null)
	{
		$logger = $logger ?: new LogToFile;

		$logger->log($data);
	}
}

$app = new App;

$app->log('Some Information Here', new LogToDatabase);

