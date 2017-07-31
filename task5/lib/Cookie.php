<?php
class Cookie implements iWorkData
{

    public function saveData($key, $val)
	{
        if(setcookie($key, $val))
		{
			return "куки " . $val . " установлена";
		}
    }
    public function getData($key)
    {
		if (isset($_COOKIE[$key]))
		{
			return $_COOKIE[$key];
		}
			return "куки ".$key." нет";
    }
    public function deleteData($key)
    {
		if (isset($_COOKIE[$key]))
		{
			if(setcookie($key, "", time() - 3600))
			{
				return "кука ".$key. " удалена";
			}
		}
    }
}       
