<?php
    header('Content-type: application/json');

    include_once('jsoninput.php');
    include_once('actors.php');
    include_once('genres.php');
    include_once('films.php');
    include_once('connection.php');


    $method = $_SERVER['REQUEST_METHOD'];
    //die(print_r($_POST));
    $q = $_GET['q'];
    $params = explode('/', $q);
    $type = $params[0];

    if(count($params) == 2)
    {
        $id = $params[1];
    }
    elseif(count($params) == 5)
    {
        $genre = $params[1];
        $actor_first_name = $params[2];
        $actor_last_name = $params[3];
        $order_by = $params[4];
    }
    else
    {

    }
    //die(print_r($_POST));
    switch ($method) {
        case GET:
            if($type === 'films')
            {
                //получение фильма по id
                if(isset($id))
                {
                    echo json_encode('test');
                    echo getFilmById($connection, $id);
                } 
                //получение фильма по имени актера и по жанру и фильтрация по жанру или актеру
                elseif(isset($actor_first_name))
                {
                    echo getFilmByActorAndGenre($connection, $genre, $actor_first_name, $actor_last_name, $order_by);
                }
                //получение всех фильмов
                else
                {
                    echo getAllFilms($connection);
                }
            }
            else
            {
                echo json_encode('Bad request');
            }
            break;


        case POST:

            if($type === 'films')
            {
                $data = $_POST;
                echo postFilm($connection, $data);
            }
            elseif($type === 'actors')
            {
                $data = $_POST;
                echo postActor($connection, $data);
            }
            else
            {
                $data = $_POST;
                echo postGenre($connection, $data);
            }
            break;


        case PUT:

            if($type === 'films')
            {
                if(isset($id))
                {
                    $data = file_get_contents('php://input');
                    //die(print_r($data));
                    $data = json_decode($data, true);
                    // die(print_r($data));
                    // die(print_r($data['name']));
                    echo putFilm($connection, $id, $data);
                }
            }
            elseif($type === 'actors')
            {
                if(isset($id))
                {   
                    $data = file_get_contents('php://input');
                    //die(print_r($data));
                    $data = json_decode($data, true);
                    //die(print_r($data));
                    echo putActor($connection, $id, $data); 
                }
            }
            else
            {
                if(isset($id))
                {   
                    $data = file_get_contents('php://input');
                    //die(print_r($data));
                    $data = json_decode($data, true);
                    //die(print_r($data));
                    echo putGenre($connection, $id, $data); 
                }
            }
            break;


        case DELETE:
            if($type === 'films')
            {
                if(isset($id))
                {
                    echo deleteFilm($connection, $id);
                }
            }
            elseif($type === 'actors')
            {
                if(isset($id))
                {
                    echo deleteActor($connection, $id);
                }
            }
            else
            {
                if(isset($id))
                {
                    echo deleteGenre($connection, $id);
                }
            }
            break;
    }
?> 
