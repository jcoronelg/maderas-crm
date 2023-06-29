<?php
    class jwt_key{
        private $_CI;   
        public function __construct()
        {
        }

        function getSecretKey(){
            return "ThisIsMySecretKey";
        }
    }
?>