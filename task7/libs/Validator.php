<?php

/**
 * Description of Validator
 *
 * @author yoink
 */
abstract class Validator
{
	public static function validName($name)
	{
		if(!empty($name))
		{
			if((preg_match('/^([A-Za-zА-Яа-яЁё]+[\s\-]*)+$/u', trim($name))) && ((mb_strlen(trim($name), 'utf8') >= 3 )))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		return false;
	}

	public static function validEmail($email)
	{
		if(!empty($email))
		{
			if(filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				return true;
			}
			return false;
		}
		return false;
	}

	public static function ValidMsg($msg)
	{
		if(!empty($msg))
		{
			if((mb_strlen(trim($msg), 'utf8') >= 4) && (mb_strlen(trim($msg), 'utf8') <= 200))
			{
				return true;
			}
			else
			{

				return false;
			}
		}
		return false;
	}

	public static function ValidSubj($subj)
	{
		if(isset($subj))
		{
			if(($subj !== '') || ($subj==="0"))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		return false;
	}

	private function __construct(){}
}
