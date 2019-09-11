<?php

/**
 * WeatherBO
 */
class WeatherBO
{
  private $weatherDAO;

  /**
   * Constructor
   * 
   * @param WeatherDAO $weatherDAO
   */
  public function __construct(WeatherDAO $weatherDAO)
  {
    $this->weatherDAO = $weatherDAO;
  }
    
  /**
   * Setters
   */
  public function __set($name, $value) 
  {
    $this->$name = $value;
  }

  /**
   * Getters
   */
  public function __get($name) 
  {
    return $this->$name;
  }

  /**
   * Create a Weather
   * 
   * @param null
   * @return Array
   */
  public function create()
  {
    /**
     * Regras de negócio aqui:
     */
    return $this->weatherDAO->create();
  } 


  /**
   * Read all Weathers
   * 
   * @param null
   * @return Array
   */
  public function read()
  {
    /**
     * Regras de negócio aqui:
     */
    return $this->weatherDAO->read();
  }

  /**
   * Update a Weather
   * 
   * @param Integer $id
   * @return Array
   */
  public function update($id)
  {
    /**
     * Regras de negócio aqui:
     */
    return $this->weatherDAO->update($id);
  }

  /**
   * Delete a Weather
   * 
   * @param Integer $id
   * @return Array
   */
  public function delete($id)
  {
    /**
     * Regras de negócio aqui:
     */
    return $this->weatherDAO->delete($id);
  }

}
