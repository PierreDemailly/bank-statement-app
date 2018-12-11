<?php
declare(strict_types = 1);

/**
 * Class to connect to the database
 */
class Database
{
	const HOST = "localhost",
				BASE = "bank",
				USER = "root",
				PASS = "root";

	/**
	 * Get the instance of PDO
	 * @return PDO
	 */
	static public function getInstance(){
		try
		{
			$db = new PDO("mysql:host=" . self::HOST .";dbname=" . self::BASE, self::USER, self::PASS);
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $db;
		}
		catch (PDOException $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
}
