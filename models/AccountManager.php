<?php
declare(strict_types = 1);

/**
 * Class representing a bank account manager
 */
class AccountManager
{
  private $database;

  /**
   * Init database
   */
  public function __construct()
  {
    $this->setDatabase(Database::getInstance());
  }

  /**
   * Create a bank account
   * @param string $name
   * @return void
   */
  public function createAccount($name)
  {
    $stmt = $this->database->prepare('INSERT INTO accounts (name) VALUES (:name)');
    $stmt->bindValue('name', $name, PDO::PARAM_STR);
    $stmt->execute();
  }

  /**
   * Search an account by name and check if he exists
   * @param string $name
   * @return void
   */
  public function accountExist($name)
  {
    $stmt = $this->database->prepare('SELECT COUNT(id) as count FROM accounts WHERE name = :name');
    $stmt->bindValue('name', $name, PDO::PARAM_STR);
    $stmt->execute();
    return ($stmt->fetch()->count > 0);
  }

  /**
   * Get an account by ID or get all accounts if no ID given
   * @param integer $id
   * @return void
   */
  public function getAccount($id = null)
  {
    if($id !== null)
    {
        $stmt = $this->database->prepare('SELECT id, name, balance FROM accounts WHERE id = :id');
        $stmt->bindValue('id', $id, PDO::PARAM_INT);
        $stmt->execute(PDO::FETCH_ASSOC);
        return new Account($stmt->fetch());
    }
    else 
    {
      $stmt = $this->database->query('SELECT id, name, balance FROM accounts');
      foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $account)
      {
        $accounts[] = new Account($account);
      }
      return $accounts;
    }
  }

  /**
   * Credit an account
   * @param int $balance
   * @param int $id
   * @return void
   */
  public function creditAccount($balance, $id)
  {
    $stmt = $this->database->prepare('UPDATE accounts SET balance = balance + :balance WHERE id = :id');
    $stmt->bindValue('balance', $balance, PDO::PARAM_INT);
    $stmt->bindValue('id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }

  /**
   * Debt an account
   * @param int $balance
   * @param int $id
   * @return void
   */
  public function deptAccount($balance, $id)
  {
    $stmt = $this->database->prepare('UPDATE accounts SET balance = balance - :balance WHERE id = :id');
    $stmt->bindValue('balance', $balance, PDO::PARAM_INT);
    $stmt->bindValue('id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }

  /**
   * Get the value of database
   * @return PDO
   */ 
  public function getDatabase() { return $this->database; }

  /**
   * Set the value of database
   * @return self
   */ 
  public function setDatabase($database) { $this->database = $database; return $this; }
}
