<?php
  
  // Headers:
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Headers: *');

  // Imports:
  include_once './controllers/WeatherController.php';
  include_once './helpers/Connection.php';
  include_once './models/City/CityBO.php';
  include_once './controllers/CityController.php';
  include_once './models/City/CityDAO.php';
  include_once './models/City/CityDTO.php';
  include_once './models/Interf/Methods.php';
  include_once './models/Weather/WeatherBO.php';
  include_once './models/Weather/WeatherDAO.php';
  include_once './models/Weather/WeatherDTO.php';

  // Connection:
  $conn = new Connection('weather', 'mysql', 'localhost', 'root', 'root');

  // Data:
  $dados = $_POST['data'];
  $dados = json_decode($dados, true);

  echo var_dump($_POST);
  die;

  // var_dump($_POST['data']);
  // die;

  // Controller:
  $controller = new CityController($conn->conn);

  // Insert:
  $cities = $controller->read();
  $id = verifyCity($cities, $dados['city']['name'], $dados['city']['country'], $controller);
  function verifyCity($cities, $name, $country, $controller) {
    foreach ($cities['cities'] as $city) {
      if ($city['name'] === $name) {
        return $city['id'];
      }
    }
    $id = $controller->create($name, $country)['city'];
    return $id;
  }

  $weatherController = new WeatherController($conn->conn);
  foreach ($dados['list'] as $dado) {
    $weatherController->create(
      $id, 
      $dado['dt'], 
      $dado['main']['temp'],
      $dado['main']['temp_min'],
      $dado['main']['temp_max'],
      $dado['main']['pressure'],
      $dado['main']['sea_level'],
      $dado['main']['grnd_level'],
      $dado['main']['humidity'],
      $dado['weather'][0]['main'],
      $dado['weather'][0]['description']
    );
  }
