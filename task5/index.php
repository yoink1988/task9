<?php

include_once __DIR__ . "/lib/config.php";
include_once ROOT."/lib/autoload.php";
include_once __DIR__ . "/lib/Cookie.php";


if(isset($_POST['addCookie']) && !empty($_POST['string']))
{
	$handler = new Cookie();
	$result = $handler->saveData(KEY, $_POST['string']);
}
if (isset($_POST['watchCookie']))
{
	$handler = new Cookie();
	$result = $handler->getData(KEY);
}
if (isset($_POST['deleteCookie']))
{
	$handler = new Cookie();
	$result = $handler->deleteData(KEY);
}


if(isset($_POST['addSess']) && !empty($_POST['string']))
{
	$handler = new Session();
	$result = $handler->saveData(KEY, $_POST['string']);
}

if(isset($_POST['watchSess']))
{
	$handler = new Session();
	$result = $handler->getData(KEY);
}


if(isset($_POST['deleteSess']))
{
	$handler = new Session();
	$result = $handler->deleteData(KEY);
}


if(isset($_POST['addMysql']) && !empty($_POST['string']))
{
	echo 'sdasd';
	$handler = new Mysql;
	$result = $handler->saveData(KEY, $_POST['string']);
}

if(isset($_POST['watchMysql']))
{
	$handler = new Mysql;
	$result = $handler->getData(KEY);

}

if(isset($_POST['deleteMysql']))
{
	$handler = new Mysql;
	$result = $handler->deleteData(KEY);
}

if(isset($_POST['addPg']) && !empty($_POST['string']))
{
	echo 'sdasd';
	$handler = new Mysql;
	$result = $handler->saveData(KEY, $_POST['string']);
}

if(isset($_POST['watchPg']))
{
	$handler = new Mysql;
	$result = $handler->getData(KEY);

}

if(isset($_POST['deletePg']))
{
	$handler = new Mysql;
	$result = $handler->deleteData(KEY);
}


	include_once ROOT . "/templates/index.php";
?>
