<?php
    interface ActorRepositoryInterface
    {
        public static function add($data);
        public static function edit($data, $id);
        public static function delete($id);
    }

    class ActorRepository implements ActorRepositoryInterface
    {
        public static function add($data)
        {
            $connection = MySQL::connection();
            $firstName = $data['firstName'];
            $lastName = $data['lastName'];
            $query = $connection->query(
                "INSERT INTO `films` (`id`, `first_name`, `last_name`) VALUES (NULL, '$name', '$genreId')"
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
            $firstName = $data['firstName'];
            $lastName = $data['lastName'];
            $query = $connection->query(
                "UPDATE `actors` SET `first_name` = '$firstName', `last_name` = '$lastName' WHERE `id` = '$id'"
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
                "DELETE FROM `actors` WHERE `id` = '$id'"
            );
            if($query) {
                return true;
            } else {
                return false;
            }
        }
    }