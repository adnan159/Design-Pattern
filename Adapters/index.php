<?php

require "vendor/autoload.php";

use MyApp\Book;
use MyApp\BookInterface;
use MyApp\Kindle;
use MyApp\eReaderInterface;
use MyApp\KindleAdapter;

class Person {

	public function read(BookInterface $book)
	{
		$book->open();
		$book->turnPage();
	}
}

(new Person)->read(new KindleAdapter(new Kindle));

