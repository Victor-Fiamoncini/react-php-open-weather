<?php

/**
 * WeatherDTO
 */
class WeatherDTO {

  private $city;
  private $date;
  private $temp;
  private $temp_min;
  private $temp_max;
  private $pressure;
  private $sea_level;
  private $atmospheric_pressure;
  private $humidity;
  private $main;
  private $description;

  /**
   * Constructor
   * 
   * @param Integer $date, $city
   * @param String $main, $description 
   * @param Float $temp, $temp_min, $temp_max, $pressure, $sea_level, $atmospheric_pressure, $humidity
   */
  public function __construct($city, $date, $temp, $temp_min, $temp_max, $pressure, $sea_level, $atmospheric_pressure, $humidity,
  $main, $description) {
    $this->city = $city;
    $this->date = $date;
    $this->temp = $temp;
    $this->temp_min = $temp_min;
    $this->temp_max = $temp_max;
    $this->pressure = $pressure;
    $this->sea_level = $sea_level;
    $this->atmospheric_pressure = $atmospheric_pressure;
    $this->humidity = $humidity;
    $this->main = $main;
    $this->description = $description;
  }

  /**
   * Setters
   */
  public function __set($name, $value) {
    $this->$name = $value;
  }

  /**
   * Getters
   */
  public function __get($name) {
    return $this->$name;
  }

}
