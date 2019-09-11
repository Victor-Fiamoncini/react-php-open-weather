<?php

    // Imports:
    require_once "./models/Interf/Methods.php";

    class CityDAO implements Methods {

        private $conn;
        private $cityDTO;

        /**
         * Constructor
         * 
         * @param CityDTO $cityDTO
         * @param PDO $conn
        */
        public function __construct(CityDTO $cityDTO = null, PDO $conn) {
            $this->cityDTO = $cityDTO;
            $this->conn = $conn;
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
         * Create a city
         * 
         * @param null
         * @return Array
         */
        public function create() {
          $name = $this->cityDTO->name;
          $country = $this->cityDTO->country;
          try {
            $statement = $this
              ->conn
              ->prepare('INSERT INTO city (name, country) VALUES (:name, :country)');
            $statement->bindParam(':name', $name, PDO::PARAM_STR);
            $statement->bindParam(':country', $country, PDO::PARAM_STR);
            $statement->execute();
            if ($statement->rowCount() > 0) {
              return [
                'status' => 201,
                'flash' => $_SESSION['alert-success'] = 'City created',
                'city' => $this->conn->lastInsertId()
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
         * Read all cities
         * 
         * @param null
         * @return Array
         */
        public function read() {
          try {
            $statement = $this
            ->conn
            ->prepare('SELECT * FROM city');
            $statement->execute();
            if ($statement->rowCount() > 0) {
              return [
              'status' => 200,
              'cities' => $statement->fetchAll(PDO::FETCH_ASSOC)
              ];
            } 
          } catch (\Throwable $th) {
            return [
              'status' => 500,
              'flash' => $_SESSION['alert-danger'] = $th->getMessage()
            ];
          }
        }

        public function update($id){
          $name = $this->cityDTO->name;
          $country = $this->cityDTO->country;
          try {
            $statement = $this
              ->conn
              ->prepare('UPDATE city SET name = :name, country = :country WHERE id = :id');
            $statement->execute([
              'id' => $id,
              'name' => $name,
              'country' => $country
            ]);
            if ($statement->rowCount() > 0) {
              return [
                'status' => 200,
                'flash' => $_SESSION['alert-success'] = 'City updated'
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
         * Delete a city
         * 
         * @param Integer $id
         * @return Array
         */
        public function delete($id) {
          try {
            $statement = $this
            ->conn
            ->prepare('DELETE FROM city WHERE id = :id');
            $statement->execute([ 'id' => $id ]);
            if ($statement->rowCount() > 0) {
              return [
              'status' => 200,
              'flash' => $_SESSION['alert-success'] = 'City deleted'
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

?>
