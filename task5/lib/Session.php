<?php
class Session implements iWorkData
{


    public function saveData($key, $val)
    {
        if (session_start(array($key => $val)))
		{
		$_SESSION[$key] = $val;
		return "добавлена сессия ".$key." со значением ".$val;
		}
    }
    public function getData($key)
    {
		session_start();
        if(isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }
    }
    public function deleteData($key)
    {
		session_start();
        if(isset($_SESSION[$key]))
        {
            unset($_SESSION[$key]);
        }
    }

}
?>
