<?php
    interface FilmControllerInterface
    {
        public static function callGetMethodService($parameters);
        public static function callPostMethodService($parameters);
        public static function callPutMethodService($parameters);
        public static function callDeleteMethodService($parameters);
    }

    class FilmController implements FilmControllerInterface
    {
        public static function callGetMethodService($parameters)
        {
            if(count($parameters) == 1) {
                //die(print_r($parameters));
                $answer = FilmService::getAll();
                return $answer;
            }
            if(count($parameters) == 2) {
                $answer = FilmService::getById($parameters[1]);
                return $answer;
            }
            if(count($parameters) == 5) {
                $answer = FilmService::getByActorGenreAndFilter($parameters);
                return $answer;
            }
        }
        public static function callPostMethodService($parameters)
        {
            $answer = FilmService::add($parameters);
            return $answer;
        }
        public static function callPutMethodService($parameters)
        {
            $answer = FilmService::edit($parameters[1]);
        }
        public static function callDeleteMethodService($parameters)
        {
            $answer = FilmService::delete($parameters[1]);
            return $answer;
        }
    }