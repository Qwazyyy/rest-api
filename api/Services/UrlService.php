<?php
    class UriService
    {
        // public static function getRequestMethod()
        // {
        //     return $_SERVER['REQUEST_METHOD'];
        // }

        public static function getUriParameters()
        {
            $uri = $_GET['parameters'];
            $parameters = explode('/', $uri);
            //self::getEntity($parameters);
            return $parameters;
        }
        // private static function getEntity($parameters)
        // {
        //     return $entity = $parameters[0];
        // }
    }