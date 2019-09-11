<?php

    require_once './models/City/CityBO.php';
    require_once './models/City/CityDAO.php';
    require_once './models/City/CityDTO.php';

    class CityController {

        /**
         * Constructor
         * 
         * @param PDO $conn
         */
        public function __construct(PDO $conn) {
            $this->conn = $conn;
        }

        /**
         * Create a city
         * 
         * @param String $name, $country
         * @return Array
         */
        public function create($name, $country) {
            $cityBO = new CityBO(new CityDAO(
            new CityDTO($name, $country), 
            $this->conn
            ));
            return $cityBO->create();
        }

        /**
         * Read all cities
         * 
         * @param null
         * @return Array
         */
        public function read() {
            $cityBO = new CityBO(new CityDAO(null, $this->conn));
            return $cityBO->read();
        }

        /**
         * Update a city
         * 
         * @param Integer $id
         * @param String $name, $country
         * @return Array
         */
        public function update($id, $name, $country) {
            $cityBO = new cityBO(new cityDAO(
            new cityDTO($name, $country), 
            $this->conn
            ));
            return $cityBO->update($id);
        }

        /**
         * Delete a city
         * 
         * @param Integer $id
         * @return Array
         */
        public function delete($id) {
            $cityBO = new cityBO(new cityDAO(null, $this->conn));
            return $cityBO->delete($id);
        }
    }

?>
