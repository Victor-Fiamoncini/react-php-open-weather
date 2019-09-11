<?php

    class CityBO {

        private $cityDAO;

        /**
         * Constructor
         * 
         * @param CityDAO $cityDAO
         */
        public function __construct(CityDAO $cityDAO) {
          $this->cityDAO = $cityDAO;
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
        /**
         * Regras de negócio aqui:
         */
            return $this->cityDAO->create();
        }

        /**
         * Read all cities
         * 
         * @param null
         * @return Array
         */
        public function read() {
            return $this->cityDAO->read();
        }

        /**
         * Update a city
         * 
         * @param Integer $id
         * @return Array
         */
        public function update($id) {
            return $this->cityDAO->update($id);
        }

        /**
         * Delete a city
         * 
         * @param Integer $id
         * @return Array
         */
        public function delete($id) {
            /**
             * Regras de negócio aqui:
             */
            return $this->cityDAO->delete($id);
        }

    }

?>
