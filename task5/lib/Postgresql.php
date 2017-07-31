<?php
class Postgresql implements iWorkData
{
	private $link;
	private function getConnect()
	{
		if($this->link !=null)
		{
			return $this->link;
		}
		if($this->link = pg_connect("host=".POSTGRE_HOST.
								", dbname=".POSTGRE_DB_NAME.
								  ", user=".POSTGRE_USER.
							  ", password=".POSTGRE_PASS)) // PORT
		{
			return $this->link;
		}
	}
	
    public function saveData($key, $val)
    {
		$this->deleteData($key);			//if no primary key in table
        $val = pg_escape_string($val);
        $params = array('key'=> $key, 'data' => $val);
		$query = 'INSERT INTO '.POSTGRE_TABLE_NAME." (key, data) VALUES (";

				foreach($params as $v)
				{
					$query .= "{$v}, ";
				}
				$query = substr($query, 0, -2);
				$query .=")";


		echo $query;
		if (pg_query($this->getConnect(), $query))
		{
			return "запись добавлена";
		}
		else(pg_error($this->getConnect()));
    }



    public function getData($key)
	{
		$query = "SELECT key, data from ".POSTGRE_TABLE_NAME. " where "
													. "key = {$key}";
			$result=  array();
			if(!$stmt = pg_query($this->getConnect(), $query))
			{
				return false;
			}
			while($res = pg_fetch_array($stmt, MYSQL_ASSOC))
			{
				$result[]=$res;
			}
			return $result;
	}

    public function deleteData($key)
	{
		$query = "DELETE from ".POSTGRE_TABLE_NAME." where key = {$key}";

		if(pg_query($this->getConnect(), $query))
		{
			return pg_affected_rows($this->getConnect()). " row deleted";
		}
		else
		{
			return false;
		}
	}


	public function __construct(){}

}
