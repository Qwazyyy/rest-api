<?php
    interface ControllerInterface
    {
        public static function callEntityController($requestMethod, $parameters);
    }
    class Controller
    {
        public static function callEntityController($requestMethod, $parameters)
        {
            if($requestMethod === "GET") {
                if($parameters[0] === 'films') {
                    $answer = FilmController::callGetMethodService($parameters);
                    return $answer;
                }
                if($parameters[0] === 'actors') {
                    $answer = ActorController::callGetMethodService($parameters);
                    return $answer;
                }
                if($parameters[0] === 'genres') {
                    $answer = GenreController::callGetMethodService($parameters);
                    return $answer;
                }
                return 'bad request';
            }
            if($requestMethod === "POST") {
                if($parameters[0] === 'films') {
                    $answer = FilmController::callPostMethodService($parameters);
                    return $answer;
                }
                if($parameters[0] === 'actors') {
                    $answer = ActorController::callPostMethodService($parameters);
                    return $answer;
                }
                if($parameters[0] === 'genres') {
                    $answer = GenreController::callPostMethodService($parameters);
                    return $answer;
                }
                return 'bad request';
            }
            if($requestMethod === "PUT") {
                if($parameters[0] === 'films') {
                    $answer = FilmController::callPutMethodService($parameters);
                    return $answer;
                }
                if($parameters[0] === 'actors') {
                    $answer = ActorController::callPutMethodService($parameters);
                    return $answer;
                }
                if($parameters[0] === 'genres') {
                    $answer = GenreController::callPutMethodService($parameters);
                    return $answer;
                }
                return 'bad request';
            }
            if($requestMethod === "DELETE") {
                if($parameters[0] === 'films') {
                    $answer = FilmController::callDeleteMethodService($parameters);
                    return $answer;
                }
                if($parameters[0] === 'actors') {
                    $answer = ActorController::callDeleteMethodService($parameters);
                    return $answer;
                }
                if($parameters[0] === 'genres') {
                    $answer = GenreController::callDeleteMethodService($parameters);
                    return $answer;
                }
                return 'bad request';
            }
        }
    }