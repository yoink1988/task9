<?php
try
{
	if (is_readable('config.php'))
	{
		include_once ('config.php');
	}
	else
	{
		throw new Exception('no such file: config.php');
	}

	if (is_readable(ROOT_DIR.'/libs/functions.php'))
	{
		include_once (ROOT_DIR.'/libs/functions.php');
	}
	else
	{
		throw new Exception('no such file : '.ROOT_DIR.'/libs/functions.php');
	}

	$obj = new Controller();
	$obj->run();

}
catch(Exception $e)
{
	include_once '404.php';
}