<?php
class BaseDonnee
{	
	private static $connexion = null;
	
	private function __construct() {}
	
	public static function getConnexion()
	{
		if(self::$connexion == null)
			self::$connexion = new PDO(
				"mysql:host=".Config::DB_HOTE.";dbname=".Config::DB_NOM."", 
				Config::DB_UTILISATEUR, 
				Config::DB_PASS);
		return self::$connexion;
	}
	public static function close()
	{
		self::$connexion = null;
	}	
}