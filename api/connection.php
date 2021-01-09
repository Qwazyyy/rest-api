<?php
    class MySQL
    {
        private $host = 'localhost:8889';
        private $database = 'api';
        private $user = 'root';
        private $password = 'root';

        public static function connection()
        {
            $connection = new PDO('mysql:host=localhost:8889;dbname=api', 'root', 'root');
            return $connection;
        }
    }
?>