<?php
    class FilmService
    {
        // public static function getAllSortByActorOrGenre($data)
        // {
        //     $result = FilmRepository::getAllSortByActorOrGenre($data);
        //     if($result) {
        //         http_response_code(201);
        //         return getArrayFromJSON($result);
        //     } else {
        //         http_response_code(400);
        //         $answer = [
        //             "status" => false,
        //             "text" => 'Ошибка: Фильмы не найден'
        //         ];
        //         return json_encode($answer);
        //     }
        // }

        // public static function getAllFilterByActorAndGenre($data)
        // {
        //     $result = FilmRepository::getByActorGenreAndFilter($data);
        //     if($result) {
        //         http_response_code(201);
        //         return getArrayFromJSON($result);
        //     } else {
        //         http_response_code(400);
        //         $answer = [
        //             "status" => false,
        //             "text" => 'Ошибка: Фильмы не найден'
        //         ];
        //         return json_encode($answer);
        //     }
        // }

        public static function getByActorGenreAndFilter($data)
        {
            $result = FilmRepository::getByActorGenreAndFilter($data);
            if($result) {
                http_response_code(201);
                return getArrayFromJSON($result);
            } else {
                http_response_code(400);
                $answer = [
                    "status" => false,
                    "text" => 'Ошибка: Фильмы не найден'
                ];
                return json_encode($answer);
            }
        }

        public static function getById($id)
        {   
            $result = FilmRepository::getById($id);
            if($result) {
                http_response_code(201);
                return getObjectFromJSON($result);
            } else {
                http_response_code(400);
                $answer = [
                    "status" => false,
                    "text" => 'Ошибка: Фильм не найден'
                ];
                return json_encode($answer);
            }
        }

        public static function getAll()
        {
            //die(print_r($parameters));
            //echo 'xx';
            $result = FilmRepository::getAll();
            if($result) {
                http_response_code(201);
                return getArrayFromJSON($result);
            } else {
                http_response_code(400);
                $answer = [
                    "status" => false,
                    "text" => 'Ошибка: Фильмы не найдены'
                ];
                return json_encode($answer);
            }
        }

        //добавление нового фильма
        public static function add($data)
        {
            $data = $_POST;
            $result = FilmRepository::add($data);
            if($result) {
                http_response_code(201);
                $answer = [
                    "status" => true,
                    "text" => "Фильм добавлен"
                ];
            } else {
                http_response_code(400);
                $answer = [
                    "status" => false,
                    "text" => 'Ошибка: Фильм не добавлен'
                ];
            }
            return json_encode($answer);
        }

        //редактирование информации о фильме по id 
        public function edit($id, $data)
        {
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            $result = FilmRepository::edit($data, $id);
            if($result) {
                http_response_code(202);
                $answer = [
                    "status" => true,
                    "text" => "Данные о фильме обновлены"
                ];
            } else {
                http_response_code(400);
                $answer = [
                    "status" => false,
                    "text" => "Ошибка: Данные о фильме не обновлены"
                ];
            }
            return json_encode($answer);
        }

        //удаление фильма по id
        public function delete($id)
        {
            $result = FilmRepository::delete($id);
            if($result) {
                http_response_code(200);

                $answer = [
                    "status" => true,
                    "text" => "Фильм с id: $id удален"
                ];
            } else {
                http_response_code(400);

                $answer = [
                    "status" => false,
                    "text" => 'Ошибка: фильм не удален'
                ];
            }

            return json_encode($answer);
        }
    }
    