<?php
    class ActorService
    {
        //добавление нового актера
        public static function add($data)
        {
            $data = $_POST;
            $result = ActorRepository::add($data);
            if($result) {
                http_response_code(201);
                $answer = [
                    "status" => true,
                    "text" => "Актер добавлен"
                ];
            } else {
                http_response_code(400);
                $answer = [
                    "status" => false,
                    "text" => 'Ошибка: Актер не добавлен'
                ];
            }
            return json_encode($answer);
        }

        //редактирование информации о актере по id 
        public static  function edit($id, $data)
        {
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            $result = ActorRepository::edit($id, $data);
            if($result) {
                http_response_code(202);
                $answer = [
                    "status" => true,
                    "text" => "Данные об актере обновлены"
                ];
            } else {
                http_response_code(400);
                $answer = [
                    "status" => false,
                    "text" => "Ошибка: Данные об актере не обновлены"
                ];
            }
            return json_encode($answer);
        }

        //удаление актерапо id
        public static  function delete($id)
        {
            $result = ActorRepository::delete($id);
            if($result) {
                http_response_code(200);

                $answer = [
                    "status" => true,
                    "text" => "Актер с id: $id удален"
                ];
            } else {
                http_response_code(400);

                $answer = [
                    "status" => false,
                    "text" => 'Ошибка: актер не удален'
                ];
            }

            return json_encode($answer);
        }
    }