<?php
    function getArrayFromJSON($query)
    {
        $input_array = [];
        while($object = $query->fetch(PDO::FETCH_ASSOC))
        {
            $input_array[] = $object;
        }
        return json_encode($input_array, JSON_UNESCAPED_UNICODE);
    }

    //вывод строки в формате JSON
    function getObjectFromJSON($query)
    {
        return json_encode($query->fetch(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
    }
?>