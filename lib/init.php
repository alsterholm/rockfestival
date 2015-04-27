<?php
	
	error_reporting(1);
	
	spl_autoload_register(function($class) {
		require_once 'lib/classes/' . $class . '.php';
	});