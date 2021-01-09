<?php
    interface FilmsRepositoryInterface
    {
        public static function getById($id);
        public static function getAll();
        public static function add($data);
        public static function edit($data, $id);
        public static function delete($id);
    }

    class FilmsRepository implements FilmsRepositoryInterface
    {

        public static function getById($id)
        {
            $connection = MySQL::connection();
            $query = $connection->query(
                "SELECT film.id film_id, film.name film_name, genre.name genre_name
                FROM films film
                LEFT OUTER JOIN genres genre ON genre.id = film.genre_id WHERE film.id = '$id'"
            );
            if($query) {
                return true;
            } else {
                return false;
            }
        }
        public static function getAll()
        {
            $connection = MySQL::connection();
            $query = $connection->query(
                "SELECT film.id film_id, film.name film_name, genre.name genre_name
                FROM films film
                LEFT OUTER JOIN genres genre ON genre.id = film.genre_id"
            );
            if($query) {
                return $query;
            } else {
                return false;
            }
        }

        public static function add($data)
        {
            $connection = MySQL::connection();
            $name = $data['name'];
            $genreId = $data['genreId'];
            $query = $connection->query(
                "INSERT INTO `films` (`id`, `name`, `genre_id`) VALUES (NULL, '$name', '$genreId')"
            );
            if($query) {
                return true;
            } else {
                return false;
            }
        }

        public static function edit($data, $id)
        {
            $connection = MySQL::connection();
            $name = $data['name'];
            $genreId = $data['genreId'];
            $query = $connection->query(
                "UPDATE `films` SET `name` = '$name', `genre_id` = '$genreId' WHERE `id` = '$id'"
            );
            if($query) {
                return true;
            } else {
                return false;
            }
        }

        public static function delete($id)
        {
            $connection = MySQL::connection();
            $query = $connection->query(
                "DELETE FROM `films` WHERE `id` = '$id'"
            );
            if($query) {
                return true;
            } else {
                return false;
            }
        }
    }
