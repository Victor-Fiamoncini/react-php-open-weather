<?php

    /**
     * CityDTO
     */
    class CityDTO {

        private $name;
        private $country;

        /**
         * Constructor
         * 
         * @param String $name, $country
         * @param Array $prevision
         */
        public function __construct($name, $country) {
            $this->name = $name;
            $this->country = $country;
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

?>