<?php
class DATABASE_CONFIG {

	var $default = array(
		'driver' => 'mysql',
		'persistent' => true,
		'host' => 'localhost',
		'login' => 'portal_users',
		'password' => '@portal_users#',
		'database' => 'portal_users',
		'encoding' => 'utf8'
	);
	
	var $policy = array(
		'driver' => 'mysql',
		'persistent' => true,
		'host' => 'localhost',
		'login' => 'policies',
		'password' => '@policies#',
		'database' => 'policies',
		'encoding' => 'utf8'
	);
}
?>