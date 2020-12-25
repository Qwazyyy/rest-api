<?php

    function postActor($connection, $data)
    {
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $query = $connection->query(
            "INSERT INTO `actors` (`id`, `first_name`, `last_name`) VALUES (NULL, '$first_name', '$last_name')");
        // echo $connection->lastInsertId();
        http_response_code(201);
        $result = [
            "status" => true,
            "id" => $connection->lastInsertId()
        ];
        return json_encode($result);
    }

    function putActor($connection, $id, $data)
    {
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $query = $connection->query(
            "UPDATE `actors` SET `first_name` = '$first_name', `last_name` = '$last_name' WHERE `id` = '$id'");
        http_response_code(200);

        $result = [
            "status" => true,
            "text" => "Пост обновлен"
        ];
        return json_encode($result);
    }

    function deleteActor($connection, $id)
    {
        $query = $connection->query(
            "DELETE FROM `actors` WHERE `id` = '$id'");
        
        http_response_code(200);

        $result = [
            "status" => true,
            "text" => $id
        ];
        return json_encode($result);
    }
?>