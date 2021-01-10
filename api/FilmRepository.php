<?php
    interface FilmRepositoryInterface
    {
        public static function getByActorGenreAndFilter($parameters);
        public static function getById($id);
        public static function getAll();
        public static function add($parameters);
        public static function edit($parameters, $id);
        public static function delete($id);
    }

    class FilmRepository implements FilmRepositoryInterface
    {
        //запрос к базе на вывод фильмов по актеру и жанру
        public static function getByActorGenreAndFilter($parameters)
        {
            $genre = $parameters[1];
            $actor_first_name = $parameters[2];
            $actor_last_name = $parameters[3];
            $order_by = $parameters[4];

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
        //запрос к базе на вывод по ID
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
        //запрос к базе на вывод всех фильмов
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
        //запрос к базе на добавление
        public static function add($parameters)
        {
            $connection = MySQL::connection();
            $name = $parameters['name'];
            $genreId = $parameters['genreId'];
            $query = $connection->query(
                "INSERT INTO `films` (`id`, `name`, `genre_id`) VALUES (NULL, '$name', '$genreId')"
            );
            if($query) {
                return true;
            } else {
                return false;
            }
        }
        //запрос к базе на изменение
        public static function edit($parameters, $id)
        {
            $connection = MySQL::connection();
            $name = $parameters['name'];
            $genreId = $parameters['genreId'];
            $query = $connection->query(
                "UPDATE `films` SET `name` = '$name', `genre_id` = '$genreId' WHERE `id` = '$id'"
            );
            if($query) {
                return true;
            } else {
                return false;
            }
        }
        //запрос к базе на удаление
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
