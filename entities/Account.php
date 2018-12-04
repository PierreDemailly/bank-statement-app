<?php
declare(strict_types = 1);

/**
 * Class representing a bank account
 */
class Account
{
  private $id;
  private $name;
  private $balance;
  
  /**
   * Get the value of id
   * @return int
   */ 
  public function getId() { return $this->id; }

  /**
   * Set the value of id
   * @return  self
   */ 
  public function setId($id) { $this->id = $id; return $this; }

  /**
   * Get the value of name
   * @return string
   */ 
  public function getName() { return $this->name; }

  /**
   * Set the value of name
   * @return self
   */ 
  public function setName($name) { $this->name = $name; return $this; }

  /**
   * Get the value of balance
   * @return int
   */ 
  public function getBalance() { return $this->balance; }

  /**
   * Set the value of balance
   * @return self
   */ 
  public function setBalance($balance) { $this->balance = $balance; return $this; }
}
