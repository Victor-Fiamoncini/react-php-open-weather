<?php
  
// Imports:
require_once './models/Weather/WeatherBO.php';
require_once './models/Weather/WeatherDAO.php';
require_once './models/Weather/WeatherDTO.php';

/**
 * WeatherController
 */
class WeatherController
{
  /**
   * Constructor
   * 
   * @param PDO $conn
   */
  public function __construct(PDO $conn) 
  {
    $this->conn = $conn;
  }

  /**
   * Create a weather
   * 
   * @param String $main, $description
   * @param Float $temp, $temp_min, $temp_max, $pressure, $sea_level, $atmospheric_pressure, $humidity
   * @param Int $date, $city
   * @return Array
   */
  public function create($city, $date, $temp, $temp_min, $temp_max, $pressure, $sea_level, $atmospheric_pressure, 
  $humidity, $main, $description) 
  {
    $weatherBO = new WeatherBO(new WeatherDAO(
      new WeatherDTO($city, $date, $temp, $temp_min, $temp_max, $pressure, $sea_level, $atmospheric_pressure, $humidity,
      $main, $description), 
      $this->conn
    ));
    return $weatherBO->create();
  }

  /**
   * Read all weathers
   * 
   * @param null
   * @return Array
   */
  public function read() 
  {
    $weatherBO = new WeatherBO(new WeatherDAO(null, $this->conn));
    return $weatherBO->read();
  }

  /**
   * Update a project
   * 
   * @param String $main, $description
   * @param Float $temp, $temp_min, $temp_max, $pressure, $sea_level, $atmospheric_pressure, $humidity
   * @param Int $id, $date, $city
   * @return Array
   */
  public function update($id, $city, $date, $temp, $temp_min, $temp_max, $pressure, $sea_level, $atmospheric_pressure, 
  $humidity, $main, $description) 
  {
    $weatherBO = new WeatherBO(new WeatherDAO(
      new WeatherDTO($city, $date, $temp, $temp_min, $temp_max, $pressure, $sea_level, $atmospheric_pressure, 
      $humidity, $main, $description), 
      $this->conn
    ));
    return $weatherBO->update($id);
  }

  /**
   * Delete a project
   * 
   * @param Integer $id
   * @return Array
   */
  public function delete($id) 
  {
    $weatherBO = new WeatherBO(new WeatherDAO(null, $this->conn));
    return $weatherBO->delete($id);
  }
  
}
