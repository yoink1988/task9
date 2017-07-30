<?php
function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function __autoload($classname)
{
	if(is_readable(ROOT_DIR.'/libs/'.$classname.'.php'))
	{
		include_once ROOT_DIR.'/libs/'.$classname.'.php';
	}
	else
	{
		throw new Exception('no such file : '.ROOT_DIR.'/libs/'.$classname.'.php');
	}
}