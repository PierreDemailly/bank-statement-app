<?php
/**
 * Class representing a User manager
 */
class UserManager
{
  /**
   * @var PDO
   */
  private $database;

  /**
   * Init PDO instance
   */
  public function __construct()
  {
    $this->setDatabase(Database::getInstance());
  }

  /**
   * Add a User in database
   * @param [type] $user
   * @return void
   */
  public function addUser($user)
  {
    $stmt = $this->database->prepare('INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)');
    $stmt->bindValue('firstname', $user->getFirstname(), PDO::PARAM_STR);
    $stmt->bindValue('lastname', $user->getLastname(), PDO::PARAM_STR);
    $stmt->bindValue('email', $user->getEmail(), PDO::PARAM_STR);
    $stmt->bindValue('password', password_hash($user->getPassword(), PASSWORD_DEFAULT), PDO::PARAM_STR);
    $stmt->execute();
  }

  /**
   * Get a user with id
   * - int = search by id
   * - string = search by name
   * @param string|int $id
   * @return void
   */
  public function getUser($id)
  {
    if(ctype_digit($id))
    {
      $stmt = $this->database->prepare('SELECT * FROM users WHERE id = :id');
      $stmt->bindValue('id', $id, PDO::PARAM_INT);
    }
    else
    {
      $stmt = $this->database->prepare('SELECT * FROM users WHERE email = :email');
      $stmt->bindValue('email', $id, PDO::PARAM_STR);
    }
    $stmt->execute();
    return new User($stmt->fetch(PDO::FETCH_ASSOC));
  }

  /**
   * check if email already exist
   * @param string $email
   * @return int
   */
  public function registeredEmail($email)
  {
    $stmt = $this->database->prepare('SELECT COUNT(id) as count FROM users WHERE email = :email');
    $stmt->bindValue('email', $email, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch()->count;
  }

  /**
   * Check password
   *
   * @param string $email
   * @param string $pass
   * @return boolean
   */
  public function checkPassword($email, $pass)
  {
    $stmt = $this->database->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->bindValue('email', $email, PDO::PARAM_STR);
    $stmt->execute();
    return password_verify($pass, $stmt->fetch()->password);
  }
  /**
   * Get the value of database
   */ 
  public function getDatabase() { return $this->database; }

  /**
   * Set the value of database
   * @return  self
   */ 
  public function setDatabase($database) { $this->database = $database; return $this; }
}
