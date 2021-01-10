<?php
    class GenreService
    {
        //добавление нового фильма
        public static function add($data)
        {
            $result = GenreRepository::add($data);
            if($result) {
                http_response_code(201);
                $answer = [
                    "status" => true,
                    "text" => "Жанр добавлен"
                ];
            } else {
                http_response_code(400);
                $answer = [
                    "status" => false,
                    "text" => 'Ошибка: Жанр не добавлен'
                ];
            }
            return json_encode($answer);
        }

        //редактирование информации о фильме по id 
        public function edit($id, $data)
        {
            $result = GenreRepository::edit($data, $id);
            if($result) {
                http_response_code(202);
                $answer = [
                    "status" => true,
                    "text" => "Данные о жанре обновлены"
                ];
            } else {
                http_response_code(400);
                $answer = [
                    "status" => false,
                    "text" => "Ошибка: Данные о жанре не обновлены"
                ];
            }
            return json_encode($answer);
        }

        //удаление фильма по id
        public function delete($id)
        {
            $result = GenreRepository::delete($id);
            if($result) {
                http_response_code(200);

                $answer = [
                    "status" => true,
                    "text" => "Жанр с id: $id удален"
                ];
            } else {
                http_response_code(400);

                $answer = [
                    "status" => false,
                    "text" => 'Ошибка: Жанр не удален'
                ];
            }

            return json_encode($answer);
        }
    }