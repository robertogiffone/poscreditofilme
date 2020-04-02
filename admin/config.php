<?php
require 'environment.php';

global $config;

//Para fazer conexão ao banco

global $db;

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/projetos_para_portfolio/temposcreditos/admin/");
	$config['dbname'] = 'temposcreditos';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "http://");
	$config['dbname'] = '';
	$config['host'] = 'localhost';
	$config['dbuser'] = '';
	$config['dbpass'] = '';
}


$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'].';charset=utf8', $config['dbuser'], $config['dbpass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);