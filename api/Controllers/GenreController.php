<?php
    interface GenreControllerInterface
    {
        public static function callGetMethodService();
        public static function callPostMethodService();
        public static function callPutMethodService();
        public static function callDeleteMethodService($parameters);
    }

    class GenreController implements GenreControllerInterface
    {
        public static function callGetMethodService()
        {
            
        }
        public static function callPostMethodService()
        {
            $answer = GenreService::add($parameters);
            return $answer;
        }
        public static function callPutMethodService()
        {
            $answer = GenreService::edit($parameters[1]);
            return $answer;
        }
        public static function callDeleteMethodService($parameters)
        {
            $answer = GenreService::delete($parameters[1]);
            return $answer;
        }
    }