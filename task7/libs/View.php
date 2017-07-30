<?php

class View
{
	private $forRender = array();
	private $file = '';

	public function __construct($template)
	{
		if(is_readable($template))
		{
			$this->file = file_get_contents($template);/// тут проверить наличие темплейта
		}
		else
		{
			throw new Exception('no such file '.$template);
		}
	}

	public function addToReplace(array $mArray)
	{
		foreach($mArray as $key=>$val)
	    {
			$this->forRender[$key] = $val;
	    }
	}

	public function templateRender()
	{
		foreach($this->forRender as $key=>$val)
		{
			$this->file = str_replace($key, $val, $this->file);
		}													
		echo $this->file;
    }



}
