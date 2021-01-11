<?php
    interface GenreRepositoryInterface
    {
        public static function add($data);
        public static function edit($data, $id);
        public static function delete($id);
    }

    class GenreRepository implements GenreRepositoryInterface
    {
        public static function add($data)
        {
            $connection = MySQL::connection();
            $name = $data['name'];
            $query = $connection->query(
                "INSERT INTO `films` (`id`, `name`) VALUES (NULL, '$name')"
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
                "UPDATE `films` SET `name` = '$name' WHERE `id` = '$id'"
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
                "DELETE FROM `genres` WHERE `id` = '$id'"
            );
            if($query) {
                return true;
            } else {
                return false;
            }
        }
    }