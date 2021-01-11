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
            $sql = "INSERT INTO `actors` (`id`, `first_name`, `last_name`) VALUES (NULL, :firstName, :lastName)";
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
            $sql = "UPDATE `actors` SET `first_name` = :firstName, `last_name` = :lastName WHERE `id` = '$id'";
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
            $id = (int)$id;
            $sql = "DELETE FROM `actors` WHERE `id` = '$id'";
            $query = $connection->prepare($sql);
            $query->execute($data);
            if($query) {
                return true;
            } else {
                return false;
            }
        }
    }