<?php
    interface FilmRepositoryInterface
    {
        public static function getByActorAndGenre($data);
        public static function getById($id);
        public static function getAll();
        public static function add($data);
        public static function edit($data, $id);
        public static function delete($id);
    }

    class FilmRepository implements FilmRepositoryInterface
    {
        public static function getByActorAndGenre($data)
        {
            $genre = $data[1];
            $actor_first_name = $data[2];
            $actor_last_name = $data[3];
            $order_by = $data[4];

            $connection = MySQL::connection();
            $query = $connection->query(
                "SELECT film.id film_id, film.name film_name, genre.name genre_name 
                FROM films film 
                JOIN genres genre ON genre.id = film.genre_id 
                JOIN films_actors ON films_actors.film_id = film.id 
                JOIN actors actor ON actor.id = films_actors.actor_id 
                WHERE genre.name = '$genre' 
                AND actor.first_name = '$actor_first_name' 
                AND actor.last_name = '$actor_last_name' 
                ORDER BY '$order_by'");
            if($query) {
                return $query;
            } else {
                return false;
            }
        }
        
        public static function getById($id)
        {
            $connection = MySQL::connection();
            $query = $connection->query(
                "SELECT film.id film_id, film.name film_name, genre.name genre_name
                FROM films film
                LEFT OUTER JOIN genres genre ON genre.id = film.genre_id WHERE film.id = '$id'"
            );
            if($query) {
                return $query;
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