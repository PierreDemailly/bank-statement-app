<?php 
/**
 * Class representing an Hydrator
 */
trait Hydrator
{
  /**
   * Hydrate the class
   * @param array $data
   * @return void
   */
  public function hydrate(array $data)
  {
    foreach ($data as $key => $value) 
    {
      $method = 'set' . ucfirst($key);
      if (method_exists($this, $method)) 
      {
        $this->$method($value);
      }
    }
  }
}
