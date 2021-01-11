<?php
    interface ActorControllerInterface
    {
        public static function callGetMethodService();
        public static function callPostMethodService();
        public static function callPutMethodService();
        public static function callDeleteMethodService($parameters);
    }

    class ActorController implements ActorControllerInterface
    {
        public static function callGetMethodService()
        {
            
        }
        public static function callPostMethodService()
        {
            $answer = ActorService::add($parameters);
            return $answer;
        }
        public static function callPutMethodService()
        {
            $answer = ActorService::edit($parameters[1]);
            return $answer;
        }
        public static function callDeleteMethodService($parameters)
        {
            $answer = ActorService::delete($parameters[1]);
            return $answer;
        }
    }