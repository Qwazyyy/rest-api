<?php
    //вывод массива в формате JSON
    // function getArrayFromJSON($query)
    // {
    //     $input_array = [];
    //     while($object = $query->fetch(PDO::FETCH_ASSOC))
    //     {
    //         $input_array[] = $object;
    //     }
    //     return json_encode($input_array, JSON_UNESCAPED_UNICODE);
    // }

    // //вывод строки в формате JSON
    // function getObjectFromJSON($query)
    // {
    //     return json_encode($query->fetch(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
    // }

    //вывод всех фильмов
    function getAllFilms($connection)
    {
        $query = $connection->query(
            "SELECT film.id film_id, film.name film_name, genre.name genre_name
            FROM films film
            LEFT OUTER JOIN genres genre ON genre.id = film.genre_id");
        
        if($query->columnCount() === 0)
        {
            http_response_code(404);
        }
        else
        {
            return $json = getArrayFromJSON($query);
        }
    }

    //вывод фильма по id или по жанру
    function getFilmById($connection, $id)
    {
        $query = $connection->query(
            "SELECT film.id film_id, film.name film_name, genre.name genre_name
            FROM films film
            LEFT OUTER JOIN genres genre ON genre.id = film.genre_id WHERE film.id = '$id'");
            echo $query->rowCount();
        if($query->rowCount() === 0)
        {
            http_response_code(404);
            $result = [
                "status" => false,
                "text" => "Film not found"
            ];

            return json_encode($result);
        }
        else
        {
            return $json = getObjectFromJSON($query);
        }
    }

    //вывод фильмов по жанру и актеру
    function getFilmByActorAndGenre($connection, $genre, $actor_first_name, $actor_last_name, $order_by)
    {
        $query = $connection->query(
            "SELECT film.id film_id, film.name film_name, genre.name genre_name 
            FROM films film 
            JOIN genres genre ON genre.id = film.genre_id 
            JOIN films_actors ON films_actors.film_id = film.id 
            JOIN actors actor ON actor.id = films_actors.actor_id 
            WHERE genre.name = '$genre' AND actor.first_name = '$actor_first_name' AND actor.last_name = '$actor_last_name' ORDER BY '$order_by'");
        if($query->rowCount() === 0)
        {
            http_response_code(404);
            $result = [
                "status" => false,
                "text" => "Film not found"
            ];
            return json_encode($result);
        }
        else
        {
            return $json = getArrayFromJSON($query);
        }
    }

    //добавление нового фильма
    function postFilm($connection, $data)
    {
        $name = $data['name'];
        $genre_id = $data['genre_id'];
        //die(print_r($data));
        $query = $connection->query(
            "INSERT INTO `films` (`id`, `name`, `genre_id`) VALUES (NULL, '$name', '$genre_id')");
        //echo var_dump($query);
        // echo $connection->lastInsertId();
        http_response_code(201);
        $result = [
            "status" => true,
            "id" => $connection->lastInsertId()
        ];
        return json_encode($result);
    }

    //редактирование информации о фильме по id 
    function putFilm($connection, $id, $data)
    {
        $name = $data['name'];
        $genre_id = $data['genre_id'];
        $query = $connection->query(
            "UPDATE `films` SET `name` = '$name', `genre_id` = '$genre_id' WHERE `id` = '$id'");
        http_response_code(200);

        $result = [
            "status" => true,
            "text" => "Пост обновлен"
        ];
        return json_encode($result);
    }

    //удаление фильма по id
    function deleteFilm($connection, $id)
    {
        $query = $connection->query(
            "DELETE FROM `films` WHERE `id` = '$id'"
        );
        
        http_response_code(200);

        $result = [
            "status" => true,
            "text" => $id
        ];
        return json_encode($result);
    }
?>