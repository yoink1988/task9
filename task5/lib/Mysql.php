<?php
class Mysql implements iWorkData
{
	private $link;
	private function getConnect()
	{
		if($this->link != null)
		{
			return $this->link;
		}
		if($this->link = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS))
		{
			mysql_select_db(MYSQL_DB_NAME);
			return $this->link;
		}
	}

    public function saveData($key, $val)
    {
		$this->deleteData($key);       //if no primary key in table
        $val = mysql_escape_string($val);
        $params = array('key'=> $key, 'data' => $val);
		var_dump($params);
		$query = 'REPLACE '.MYSQL_TABLE_NAME." set ";
				foreach($params as $k => $v)
				{
					$query .= "`{$k}` = '{$v}', ";
				}
				$query = substr($query, 0, -2);
		if (mysql_query($query, $this->getConnect()))
		{
			return "запись добавлена";
		}
		else(mysql_error($this->getConnect()));
    }



    public function getData($key)
	{
		$query = "SELECT `key`, `data` from ".MYSQL_TABLE_NAME. " where "
													. "`key` = '{$key}'";
			$result=  array();
			if(!$stmt = mysql_query($query, $this->getConnect()))
			{
				return false;
			}
			while($res = mysql_fetch_array($stmt, MYSQL_ASSOC))
			{
				$result[]=$res;
			}
			return $result;
	}

    public function deleteData($key)
	{
		$query = "DELETE from ".MYSQL_TABLE_NAME." where `key` = '{$key}'";

		if(mysql_query($query, $this->getConnect()))
		{
			return mysql_affected_rows($this->getConnect()). " row deleted";
		}
		else
		{
			return false;
		}
	}


	public function __construct(){}

}
