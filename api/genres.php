<?php

    function getGenres($connection){
        $query = $connection->query("SELECT * FROM `genres`");
        $array = [];
        while($genre = $query->fetch(PDO::FETCH_ASSOC))
        {
            $array[] = $genre;
        }
        return json_encode($array, JSON_UNESCAPED_UNICODE);
    }

    function getGenreById($connection, $id){
        $query = $connection->query("SELECT * FROM `genres` WHERE `id` = '$id'")->fetch(PDO::FETCH_ASSOC);
        return json_encode($query, JSON_UNESCAPED_UNICODE);
    }

    function postGenre($connection, $data)
    {
        $name = $data['name'];
        //die(print_r($data));
        $query = $connection->query(
            "INSERT INTO `genres` (`id`, `name`) VALUES (NULL, '$name')");
        //echo var_dump($query);
        // echo $connection->lastInsertId();
        http_response_code(201);
        $result = [
            "status" => true,
            "id" => $connection->lastInsertId()
        ];
        return json_encode($result);
    }

    function putGenre($connection, $id, $data)
    {
        $name = $data['name'];
        $query = $connection->query(
            "UPDATE `genres` SET `name` = '$name' WHERE `id` = '$id'");
        http_response_code(200);

        $result = [
            "status" => true,
            "text" => "Пост обновлен"
        ];
        return json_encode($result);
    }

    function deleteGenre($connection, $id)
    {
        $query = $connection->query(
            "DELETE FROM `genres` WHERE `id` = '$id'"
        );
        
        http_response_code(200);

        $result = [
            "status" => true,
            "text" => $id
        ];
        return json_encode($result);
    }
?>