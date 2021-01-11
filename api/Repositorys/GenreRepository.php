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
            $sql = "INSERT INTO `genres` (`id`, `name`) VALUES (NULL, :name)";
            $query = $connection->prepare($sql);
            $query->execute($data);
            if($query) {
                return true;
            } else {
                return false;
            }
        }

        public static function edit($id, $data)
        {
            $connection = MySQL::connection();
            $id = (int)$id;
            $sql = "UPDATE `genres` SET `name` = :name WHERE `id` = '$id'";
            $query = $connection->prepare($sql);
            $query->execute($data);
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