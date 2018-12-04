<?php
/**
 * Class representing an Entity
 */
Abstract class Entity
{
  use Hydrator;

  public function __construct($data)
  {
    $this->hydrate($data);
  }
}
