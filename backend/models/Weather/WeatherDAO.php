<?php

// Imports:
require_once "./models/Interf/Methods.php";

/**
 * WeatherDAO
 */
class WeatherDAO implements Methods {
  
  private $conn;
  private $weatherDTO;

  /**
   * Constructor
   * 
   * @param weatherDTO $weatherDTO
   * @param PDO $conn
   */
  public function __construct(weatherDTO $weatherDTO = null, PDO $conn)  
  {
    $this->conn = $conn;
    $this->weatherDTO = $weatherDTO;
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

  /**
   * Create a Weather
   * 
   * @param null
   * @return Array
   */
  public function create() {
    $date = $this->weatherDTO->date;
    $temp = $this->weatherDTO->temp;
    $temp_min = $this->weatherDTO->temp_min;
    $temp_max = $this->weatherDTO->temp_max;
    $pressure = $this->weatherDTO->pressure;
    $sea_level = $this->weatherDTO->sea_level;
    $atmospheric_pressure = $this->weatherDTO->atmospheric_pressure;
    $humidity = $this->weatherDTO->humidity;
    $main = $this->weatherDTO->main;
    $description = $this->weatherDTO->description;
    $city_id = $this->weatherDTO->city;
    try {
      $statement = $this
        ->conn
        ->prepare('INSERT INTO weather (date, temp, temp_min, temp_max, pressure, sea_level, atmospheric_pressure,
        humidity, main, description, city_id) VALUES (:date, :temp, :temp_min, :temp_max, :pressure, :sea_level, 
        :atmospheric_pressure, :humidity, :main, :description, :city_id)');
      $statement->bindParam(':date', $date, PDO::PARAM_INT);
      $statement->bindParam(':temp', $temp, PDO::PARAM_STR);
      $statement->bindParam(':temp_min', $temp_min, PDO::PARAM_STR);
      $statement->bindParam(':temp_max', $temp_max, PDO::PARAM_STR);
      $statement->bindParam(':pressure', $pressure, PDO::PARAM_STR);
      $statement->bindParam(':sea_level', $sea_level, PDO::PARAM_STR);
      $statement->bindParam(':atmospheric_pressure', $atmospheric_pressure, PDO::PARAM_STR);
      $statement->bindParam(':humidity', $humidity, PDO::PARAM_STR);
      $statement->bindParam(':main', $main, PDO::PARAM_STR);
      $statement->bindParam(':description', $description, PDO::PARAM_STR);
      $statement->bindParam(':city_id', $city_id, PDO::PARAM_INT);
      $statement->execute();
      if ($statement->rowCount() > 0) {
        return [
          'status' => 201,
          'flash' => $_SESSION['alert-success'] = 'Weather created'
        ];
      } 
      return [
        'status' => 500,
        'flash' => $_SESSION['alert-danger'] = 'Error to create'
      ];    
    } catch (\Throwable $th) {
      return [
        'status' => 500,
        'flash' => $_SESSION['alert-danger'] = $th->getMessage(),
      ];
    }
  }

  /**
   * Read all Weathers
   * 
   * @param null
   * @return Array
   */
  public function read()
  {
    try {
      $statement = $this
        ->conn
        ->prepare('SELECT * FROM weather');
      $statement->execute();
      if ($statement->rowCount() > 0) {
        return [
          'status' => 200,
          'Weathers' => $statement->fetchAll(PDO::FETCH_ASSOC)
        ];
      } 
    } catch (\Throwable $th) {
      return [
        'status' => 500,
        'flash' => $_SESSION['alert-danger'] = $th->getMessage()
      ];
    }
  }

  /**
   * Update a Weather
   * 
   * @param Integer $id
   * @return Array
   */
  public function update($id)
  {
    $date = $this->weatherDTO->date;
    $temp = $this->weatherDTO->temp;
    $temp_min = $this->weatherDTO->temp_min;
    $temp_max = $this->weatherDTO->temp_max;
    $pressure = $this->weatherDTO->pressure;
    $sea_level = $this->weatherDTO->sea_level;
    $atmospheric_pressure = $this->weatherDTO->atmospheric_pressure;
    $humidity = $this->weatherDTO->humidity;
    $main = $this->weatherDTO->main;
    $description = $this->weatherDTO->description;
    $city_id = $this->weatherDTO->city;
    try {
      $statement = $this
        ->conn
        ->prepare('UPDATE weather SET date = :date, temp = :temp, temp_min = :temp_min, temp_max = :temp_max,
        pressure = :pressure, sea_level = :sea_level, atmospheric_pressure = :atmospheric_pressure, humidity = :humidity,
        main = :main, description = :description, city_id = :city_id WHERE id = :id');
      $statement->execute([
        'id' => $id,
        'date' => $date,
        'temp' => $temp,
        'temp_min' => $temp_min,
        'temp_max' => $temp_max,
        'pressure' => $pressure,
        'sea_level' => $sea_level,
        'atmospheric_pressure' => $atmospheric_pressure,
        'humidity' => $humidity,
        'main' => $main,
        'description' => $description,
        'city_id' => $city_id
      ]);
      if ($statement->rowCount() > 0) {
        return [
          'status' => 200,
          'flash' => $_SESSION['alert-success'] = 'Weather updated'
        ];
      } 
      return [
        'status' => 500,
        'flash' => $_SESSION['alert-danger'] = 'Error to update'
      ];
    } catch (\Throwable $th) {
      return [
        'status' => 500,
        'flash' => $_SESSION['alert-danger'] = $th->getMessage()
      ];    
    }
  }

  /**
   * Delete a Weather
   * 
   * @param Integer $id
   * @return Array
   */
  public function delete($id)
  {
    try {
      $statement = $this
        ->conn
        ->prepare('DELETE FROM weather WHERE id = :id');
      $statement->execute([ 'id' => $id ]);
      if ($statement->rowCount() > 0) {
        return [
          'status' => 200,
          'flash' => $_SESSION['alert-success'] = 'Weather deleted'
        ];
      } 
      return [
        'status' => 500,
        'flash' => $_SESSION['alert-danger'] = 'Error to delete'
      ];
    } catch (\Throwable $th) {
      return [
        'status' => 500,
        'flash' => $_SESSION['alert-danger'] = $th->getMessage()
      ];
    }
  }

}