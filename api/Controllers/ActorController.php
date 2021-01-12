<?php
    interface ActorControllerInterface
    {
        public static function callGetMethodService();
        public static function callPostMethodService($parameters);
        public static function callPutMethodService($parameters);
        public static function callDeleteMethodService($parameters);
    }

    class ActorController implements ActorControllerInterface
    {
        public static function callGetMethodService()
        {
            
        }
        public static function callPostMethodService($parameters)
        {
            $answer = ActorService::add($parameters);
            return $answer;
        }
        public static function callPutMethodService($parameters)
        {
            $answer = ActorService::edit($parameters[1], $parameters);
            return $answer;
        }
        public static function callDeleteMethodService($parameters)
        {
            $answer = ActorService::delete($parameters[1]);
            return $answer;
        }
    }