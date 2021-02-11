<?php
class Koneksi
{
	public function DBConnect()
	{
		$dbhost = 'localhost'; // set the hostname
		$dbname = 'k1090803_morilloroom'; // set the database name
		$dbuser = 'k1090803_morilloroom'; // set the mysql username
		$dbpass = '!@#123QWEasdzxc';  // set the mysql password

		try {
			$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
			$dbConnection->exec("set names utf8");
			$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return  $dbConnection;
		} catch (PDOException $e) {
			return 'Connection failed: ' . $e->getMessage();
		}
	}
}
