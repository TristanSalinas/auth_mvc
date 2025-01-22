<?php
class AbstractManager
{
  protected $db;

  public function __construct()
  {

    $dbHost = 'localhost';
    $dbName = 'mvc_db_auth';
    $dbUser = 'root';
    $dbPassword = '';


    try {
      $dsn = "mysql:host=$dbHost;dbname=$dbName";
      $this->db = new PDO($dsn, $dbUser, $dbPassword);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
  }
}
